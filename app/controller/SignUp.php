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
    think\Request;
    ;

class SignUp extends BaseController
{
    //注册
    public function signUp()
    {
        $data = Request::only(['username', 'password']);
        $User = new User();

        if ($User->save($data)) {
            $this->response(['token' => Auth::createToken()]);
        }else{
            $this->response([], 500, '注册失败，请稍后重试');
        }

    }
}