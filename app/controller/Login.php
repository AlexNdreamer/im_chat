<?php
/**
 * @Descript
 * Login.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/27/0027 15:36
 */

namespace app\controller;


use app\BaseController;
use
    app\model\Auth,
    app\validate\Auth as vali_auth,
    think\exception\ValidateException;
    ;

class Login extends BaseController
{
    public function login()
    {
        $username = input('post.username');
        $password = input('post.password');

        try{
            validate(vali_auth::class)->check(compact('username', 'password'));
        }catch (ValidateException $e) {
            $this->response([], 500,$e->getMessage());
        }
        //$userinfo = User::
        if ($uid = Auth::login($username, $password)) {
            $this->response(['token' => Auth::createToken($uid)]);
        }else{
            $this->response([], 403, '账号或密码错误');

        }

    }

    public function logout()
    {

    }
}