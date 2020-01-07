<?php
/**
 * @Descript
 * MsgHandler.php
 * @Author: Mr_dreamer
 * @Date: 2019/12/24/0024 16:39
 */

namespace app\controller;

use app\BaseController,
     think\facade\Request,
     GatewayClient\Gateway
;

class MsgHandler extends BaseController
{

    public function sendMsg()
    {
        $msg = Request::post('msg');
        $client_id = Request::post('client_id');
        if (!$msg || !$client_id ) {
            json(['code' => 500, 'msg' => '缺少必要参数']);
        }

        if (Gateway::isOnline($client_id)) {
            //Gateway::sendToClient($client_id, '服务器返回'.$msg);
            Gateway::sendToAll($msg);
        }else{
            //直接推入历史记录
            json(['code' => 500, 'msg' => '对方不在线']);
        }

        json(['code' => 200, 'msg' => '发送成功']);

    }
}