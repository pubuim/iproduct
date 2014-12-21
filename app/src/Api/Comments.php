<?php

namespace Api;

use Model\Comment;

class Comments extends Api
{
    /**
     * @var \Model\Comment
     */
    public $comment;

    /**
     * POST
     */
    public function post()
    {
        $data = $this->input->data;
        $query = $this->input->query;

        $comment = Comment::dispense()
            ->create(array('user_id' => $this->login->id) + $data);

        if (!$comment->save()) {
            $this->error('创建错误');
        }

        if (!$query['html']) {
            $this->data = $comment->as_array();
        } else {
            $this->_format = 'html';
            $this->_html_tpl = 'blocks/comment-item.php';
            $this->data['comment'] = $comment;
        }
    }
}