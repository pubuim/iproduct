<?php

namespace Web;

use Moment\Moment;

class Index extends Web
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
        $date_range = 3;

        for ($i = 0; $i < $date_range; $i++) {
            $_m = new Moment();
            $_s = $_m->subtractDays($i)->startOf('day')->getTimestamp();
            $_e = $_m->addDays(1)->startOf('day')->getTimestamp();

            /**
             * PostsF
             */
            $this->posts[date('Y-m-d', $_s)] = \Model\Post::dispense()
                ->where_gte('created_at', $_s)
                ->where_lt('created_at', $_e)
                ->order_by_desc('digg_count')
                ->find_many();
        }

        $this->render('index.php');
    }
}