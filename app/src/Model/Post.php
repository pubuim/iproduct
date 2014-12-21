<?php
namespace Model;

use Pagon\Url;

/**
 * Post Model
 *
 * @package Model
 *
 * @param string $title   标题
 * @param string $content 内容
 * @param string $url     外链
 * @param int    $status  状态    0:待审 1:正常 -1:删除
 */
class Post extends Model
{
    public static $_table = 'posts';

    // Default status
    public $status = self::UNCHECKED;

    /**
     * Define constant
     */
    const DELETED = -1;
    const UNCHECKED = 0;
    const OK = 1;

    public function url()
    {
        if ($this->content) {
            return '/posts/' . $this->id;
        } else {
            return $this->url;
        }
    }

    public function creator()
    {
        return $this->belongs_to('User', 'user_id')->find_one();
    }

    public function diggers()
    {
        return $this->has_many_through('User', 'UserDigg', 'post_id', 'user_id');
    }

    public function isDiggBy($user)
    {
        if (!$user || !$user->id) return false;
        return UserDigg::exists($user->id, $this->id);
    }

    public function permalink($full = false)
    {
        return Url::to('/posts/' . $this->id, null, $full);
    }

    public function isDeleted()
    {
        return $this->status == self::DELETED;
    }

    public function isOK()
    {
        return $this->status == self::OK;
    }

    public function isUnChecked()
    {
        return $this->status == self::UNCHECKED;
    }
}