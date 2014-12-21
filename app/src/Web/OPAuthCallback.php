<?php
namespace Web;

class OPAuthCallback extends Web
{
    public function get()
    {
        $auth = $this->input->session('opauth');

        var_dump($auth);
        return;
        if (empty($auth)) {
            $this->error('Authorize failed!');
        }

        var_dump($auth);
        echo 'ddd';

        /*try {
            if ($passport = Model::factory('Passport')
                ->where('provider', $auth['provider'])
                ->where('uid', $auth['uid'])->find_one()
            ) {
                $passport->access_token = $auth['credentials']['token'];
                $passport->expired_at = !empty($auth['credentials']['expires']) ? $auth['credentials']['expires'] : null;
                $passport->save();
            } else {
                // 检查当前是否有登陆用户
                if (!$user_id = $this->input->session('login')) {
                    // 没有用户创建一个
                    $user = Model::factory('User')->create();
                    $name = preg_replace('/\s/', '', $auth['info']['name']);
                    if (Model::factory('User')->where('name', $name)->find_one()) {
                        $name .= rand(100, 999);
                    }
                    $user->name = $name;
                    if (isset($auth['info']['description']) && ($bio = $auth['info']['description'])
                        || isset($auth['raw']['description']) && ($bio = $auth['raw']['description'])
                    ) {
                        $user->bio = $bio;
                    }
                    if (isset($auth['info']['email']) && ($email = $auth['info']['email'])) {
                        $user->email = $email;
                    }
                    $user->status = User::OK;
                    $user->save();
                    $user_id = $user->id;
                }
                // 绑定Passport
                $passport = Model::factory('Passport')->create();
                $passport->provider = $auth['provider'];
                $passport->uid = $auth['uid'];
                $passport->display_name = isset($auth['info']['nickname']) ? $auth['info']['nickname'] : $auth['info']['name'];
                $passport->access_token = $auth['credentials']['token'];
                $passport->expired_at = !empty($auth['credentials']['expires']) ? $auth['credentials']['expires'] : null;
                $passport->user_id = $user_id;
                $passport->save();
                if (!empty($user)) {
                    $user->create_passport_id = $passport->id;
                    $user->save();
                }
            }
        } catch (\Exception $e) {
            $this->alert("Create user error: " . $e->getMessage());
        }
        $this->input->session('login', $passport->user_id);
        $this->redirect('/');*/
    }
}