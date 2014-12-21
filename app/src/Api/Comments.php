<?php

namespace Api;

use Model\Comment;
use Model\Post;

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

        if (!$data['post_id']) {
            $this->error('参数错误');
        }

        if (!$data['content']) {
            $this->error('内容缺少');
        }

        $post = Post::dispense()->find_one($data['post_id']);

        if (!$post) $this->error('产品不存在');

        try {
            \ORM::get_db()->beginTransaction();

            $comment = Comment::dispense()
                ->create(array('user_id' => $this->login->id) + $data);

            if (!$comment->save()) {
                $this->error('创建错误');
            }

            $post->set_expr('comment_count', '`comment_count`+1');
            $post->save();

            \ORM::get_db()->commit();
        } catch (\PDOException $e) {
            \ORM::get_db()->rollBack();
            $this->error('数据库错误');
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