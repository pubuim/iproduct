<?php

namespace Api;

use Model\UserDigg;

class Post extends Api
{
    /**
     * @var \Model\Post
     */
    public $post;

    /**
     * GET /
     */
    public function get()
    {
        $id = $this->params['id'];

        $post = \Model\Post::dispense()->find_one($id);

        if (!$post) {
            $this->error('Unknown post');
        }

        $this->data = $post->as_array();
    }

    /**
     * POST
     */
    public function post()
    {
        $id = $this->params['id'];
        $op = $this->params['op'];

        $postModel = \Model\Post::dispense();

        $post = $postModel->find_one($id);

        if (!$post) {
            $this->error('Unknown post');
        }

        switch ($op) {
            case 'up':
                if ($post->isDiggBy($this->login)) {
                    $this->error('已经赞过');
                }

                \ORM::get_db()->beginTransaction();

                if (!UserDigg::dispense()
                    ->create(array(
                        'user_id' => $this->login->id,
                        'post_id' => $post->id
                    ))->save()
                ) {
                    $this->error('赞失败');
                }
                $post->set_expr('digg_count', '`digg_count`+1');
                $post->save();

                \ORM::get_db()->commit();
                $post = $postModel->find_one($id);
                break;
            case 'down':
                if (!$userDigg = $post->isDiggBy($this->login)) {
                    $this->error('没有赞过');
                }

                \ORM::get_db()->beginTransaction();

                $userDigg->delete();
                $post->set_expr('digg_count', '`digg_count`-1');
                $post->save();

                \ORM::get_db()->commit();
                $post = $postModel->find_one($id);
                break;
        }

        $this->data = $post->as_array();
    }
}