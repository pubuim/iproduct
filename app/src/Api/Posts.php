<?php

namespace Api;

use Moment\Moment;

class Posts extends Api
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
        $query = $this->input->query;

        $_page = max((int)$query['page'], 1);
        $_limit = max((int)$query['size'], 10);
        $_offset = ($_page - 1) * $_limit;

        if (!$query['day']) {
            $this->error('Params "day" required');
        }

        $_m = new Moment($query['day']);
        $_s = $_m->startOf('day')->getTimestamp();
        $_e = $_m->addDays(1)->startOf('day')->getTimestamp();

        $model = \Model\Post::dispense()
            ->where_gte('created_at', $_s)
            ->where_lt('created_at', $_e)
            ->offset($_offset)
            ->limit($_limit);

        $posts = $model->find_many();

        foreach ($posts as $post) {
            $this->data[] = $post->as_array();
        }
    }
}