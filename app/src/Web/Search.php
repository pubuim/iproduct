<?php

namespace Web;

use Pagon\Html;

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
     * @var string 关键词
     */
    public $keyword = '';

    /**
     * GET /
     */
    public function get()
    {
        $this->keyword = $keyword = Html::encode($this->input->query('kw'));

        $this->posts = \Model\Post::dispense()
            ->order_by_desc('digg_count')
            ->where_like('title', $keyword)
            ->find_many();

        $this->render('search.php');
    }
}