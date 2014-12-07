<?php

namespace Web;

class Post extends \Web
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
        $isRedirect = $this->params['op'] === 'r';

        $this->post = \Model\Post::dispense()
            ->find_one($id);

        if ($isRedirect) {
            $this->post->set_expr('view_count', '`view_count` + 1');
            $this->post->save();
            $this->redirect($this->post->url);
        } else {
            $this->render('post.php');
        }
    }
}