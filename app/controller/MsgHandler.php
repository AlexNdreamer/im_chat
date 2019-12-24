<?php
/**
 * @Descript
 * MsgHandler.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/24/0024 16:39
 */

namespace app\controller;


use app\BaseController;
use think\facade\Request;
use GatewayClient\Gateway;

class MsgHandler extends BaseController
{
    public function sendMsg()
    {
        $msg = Request::post('msg');
        $client_id = Request::post('client_id');
        if (!$msg || $client_id ) {
            echo 'error';
        }

        if (Gateway::isOnline($client_id)) {
            Gateway::sendToClient($client_id, $msg);
        }else{
            json(['code' => 500, 'msg' => '对方不在线']);
        }

        json(['code' => 200, 'msg' => '发送成功']);

    }
}