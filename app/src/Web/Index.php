<?php

namespace Web;

use Model\Model;
use Moment\Moment;

class Index extends \Web
{
    /**
     * @var \Model\Post
     */
    protected $_postModel;

    public $posts = array();

    /**
     * GET /
     */
    public function get()
    {
        $date_range = 5;

        for ($i = 0; $i < $date_range; $i++) {
            $_m = new Moment();
            $_s = $_m->subtractDays($i)->startOf('day')->getTimestamp();
            $_e = $_m->addDays(1)->startOf('day')->getTimestamp();

            /**
             * PostsF
             */
            $this->posts[$_s] = $this->_postModel
                ->where_gte('created_at', $_s)
                ->where_lt('created_at', $_e)
                ->order_by_desc('digg_count')
                ->limit(10)
                ->find_many();
        }

        $this->render('index.php');
    }

    public function postModel()
    {
        print_r($this->input->data);
    }

    /**
     * Before Route
     */
    protected function before()
    {
        $this->loadOrm();
        $this->_postModel = Model::factory('Post');
    }
}