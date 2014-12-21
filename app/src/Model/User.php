<?php
namespace Model;

/**
 * User Model
 *
 * @package Model
 *
 * @param string $name       名字
 * @param string $email      邮箱
 * @param string $avatar_url 头像
 * @param string $url        网站
 * @param int    $bio        一句话介绍
 */
class User extends Model
{
    public static $_table = 'users';
}