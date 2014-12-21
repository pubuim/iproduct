<?php

namespace Web;

use Moment\Moment;

class Posts extends Web
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
        // Disable layout
        $this->disableLayout();

        $date_range = 3;
        $start = $this->input->query('start');

        for ($i = 0; $i < $date_range; $i++) {
            $_m = new Moment($start);
            $_s = $_m->subtractDays($i + 1)->startOf('day')->getTimestamp();
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

        $this->render('blocks/posts.php');
    }
}