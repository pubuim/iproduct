<?php

namespace Web;

use Model\User;
use Pagon\Url;

class LoginCallback extends Web
{
    /**
     * GET /login
     */
    public function get()
    {
        $provider = $this->input->params['provider'];

        switch ($provider) {
            case 'weibo':
                $weiboConfig = $this->app->get('passport.weibo');
                $oauth = new \SaeTOAuthV2($weiboConfig['key'], $weiboConfig['secret']);
                $code = $this->input->query('code');

                if (!$code) {
                    $this->error('授权错误');
                }

                /**
                 * Get weibo token
                 */
                $keys = array();
                $keys['code'] = $code;
                $keys['redirect_uri'] = Url::to($weiboConfig['callback_url'], null, true);
                try {
                    $token = $oauth->getAccessToken('code', $keys);
                } catch (\OAuthException $e) {
                    $this->error('获取令牌错误：' . $e->getMessage());
                }

                if (!$token || !$token['uid']) {
                    $this->error('令牌信息错误，请稍后重试');
                }

                /**
                 * Login
                 */
                if ($user = User::dispense()->where('weibo_uid', $token['uid'])->find_one()) {
                    $this->login($user->id);
                }

                /**
                 * Get weibo user info
                 */
                $weiboClient = new \SaeTClientV2($weiboConfig['key'], $weiboConfig['secret'], $token['access_token']);
                $userProfile = $weiboClient->show_user_by_id($token['uid']);
                if (!$userProfile) {
                    $this->error('获取用户失败，请稍后重试');
                }

                /**
                 * Create user
                 */
                $user = User::dispense()->create(array(
                    'name'       => $userProfile['name'],
                    'avatar_url' => $userProfile['profile_image_url'],
                    'bio'        => $userProfile['description'],
                    'url'        => $userProfile['url'],
                    'weibo_uid'  => $userProfile['idstr']
                ))->save();

                $this->login($user->id);

                break;
            default:
                $this->error('不支持的类型');
        }
    }
}