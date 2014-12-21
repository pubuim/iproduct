<?php
namespace Model;

class UserDigg extends Model
{
    public static $_table = 'user_diggs';

    public static function exists($userId, $postId)
    {
        if (!$userId || !$postId) return false;

        return self::dispense()
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->find_one();
    }

    public function post()
    {
        return $this->has_one('Post');
    }

    public function user()
    {
        return $this->has_one('User');
    }
}