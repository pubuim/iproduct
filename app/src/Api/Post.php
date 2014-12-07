<?php

namespace Api;

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
     * GET /
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
                $post->set_expr('digg_count', '`digg_count`+1');
                $post->save();
                $post = $postModel->find_one($id);
                break;
        }

        $this->data = $post->as_array();
    }
}