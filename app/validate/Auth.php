<?php
/**
 * @Descript
 * Auth.php
 * @Author: Mr_dreamer
 * @Date: 2020/1/3/0003 13:30
 */

namespace app\validate;

use think\Validate;

class Auth extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25',
        'password' =>  'require|max:100',
    ];

    protected $message  =   [
        'username.require' => '缺少用户名',
        'username.max' => '用户名不能超过25位',
        'password.require' => '缺少密码',
        'password.max' => '密码长度不能超过100位',

    ];
}