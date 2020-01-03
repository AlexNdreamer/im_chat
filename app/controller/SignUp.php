<?php
/**
 * @Descript
 * Registration.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/27/0027 15:40
 */

namespace app\controller;


use app\model\User,
    app\BaseController,
    app\model\Auth,
    think\facade\Request
    ;

class SignUp extends BaseController
{
    //判断用户名是否存在
    public function isUserExist()
    {
        $User = new User();
        $data = Request::only(['username']);
        if ($User->isUserExist($data['username'])) {
            $this->response([], 555, '用户名已被占用');
        }else{
            $this->response();
        }
    }

    //注册
    public function signUp()
    {
        $data = Request::only(['username', 'password', 'nickname']);
        $User = new User();

        if ($User->isUserExist($data['username'])) {
            $this->response([], 555, '用户名已被占用');

        }

        $data['password'] = password_hash($data['password'],1);
        $data['create_time'] = date('Y-m-d H:i:s');

        if ($User->save($data)) {
            $this->response(['token' => Auth::createToken()]);
        }else{
            $this->response([], 500, '注册失败，请稍后重试');
        }

    }
}