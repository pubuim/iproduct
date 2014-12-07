<?php

namespace Web;

use Model\Model;

class Index extends \Web
{
    /**
     * @var \Model\Post
     */
    protected $_post;

    public $posts;

    public function get()
    {
        $this->posts = $this->_post->find_many();
        $this->render('index.php');
    }

    public function post()
    {
        print_r($this->input->data);
    }

    /**
     * Before Route
     */
    protected function before()
    {
        $this->loadOrm();
        $this->_post = Model::factory('Post');
    }
}