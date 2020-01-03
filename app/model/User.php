<?php
/**
 * @Descript
 * User.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/27/0027 17:18
 */

namespace app\model;
use think\Model;

class User extends Model
{
    //判断用户名是否存在
    public static function isUserExist($username)
    {
        $info = User::where('username', $username)->field('id')->findOrEmpty();

        return $info ? true : false;
    }

    /*public function createUser(array $data)
    {
        $insert = [
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ];
    }*/
}