<?php

namespace Web;

class Post extends \Web
{
    /**
     * @var \Model\Post
     */

    /**
     * @var \Model\Post
     */
    public $post;

    /**
     * GET /
     */
    public function get()
    {
        $id = $this->params->id;

        $this->post = \Model\Post::dispense()
            ->find_one($id);

        $this->render('post.php');
    }
}