<?php

namespace Api;

class Post extends \Api
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

        $post = \Model\Post::dispense()
            ->find_one($id);

        if ($post) {
            $this->data = $post->as_array();
        } else {
            $this->error('Unknown post');
        }
    }
}