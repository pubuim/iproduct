<?php

namespace Web;

use Pagon\Url;

class Login extends Web
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
                $o = new \SaeTOAuthV2($weiboConfig['key'], $weiboConfig['secret']);
                $code_url = $o->getAuthorizeURL(Url::to($weiboConfig['callback_url'], null, true));
                $this->redirect($code_url);
                break;
            default:
                $this->error('不支持的类型');
        }
    }
}