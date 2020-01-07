<?php
namespace app\controller;

use app\BaseController,
    GatewayClient\Gateway
;

class Index extends BaseController
{

    public function bindConnId()
    {
        $conn_id = input('post.connId');
        Gateway::bindUid($conn_id, UID);
        self::response();
    }

    //所有在线用户
    public function userList()
    {

    }
}
