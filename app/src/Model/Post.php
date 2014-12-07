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
    const DELETED = -1;
    const UNCHECKED = 0;
    const OK = 1;

    public function url()
    {
        if ($this->content) {
            return '/p/' . $this->id;
        } else {
            return $this->url;
        }
    }

    public function permalink()
    {
        return Url::to('/p/' . $this->id, null, true);
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