<?php

namespace Web;

class Search extends Web
{
    /**
     * @var \Model\Post
     */

    /**
     * @var \Model\Post[]
     */
    public $posts = array();

    /**
     * GET /
     */
    public function get()
    {
        $keyword = $this->input->query('kw');

        $this->posts = \Model\Post::dispense()
            ->order_by_desc('digg_count')
            ->where_like('title', $keyword)
            ->find_many();

        $this->render('search.php');
    }
}