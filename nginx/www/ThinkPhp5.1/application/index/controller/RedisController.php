<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/18
 * Time: 10:45
 */

namespace app\index\controller;

use think\cache\driver\Redis;

class RedisController
{
    public function testRedisConnection()
    {
        //连接本地的 Redis 服务
        $redis = new Redis();
        echo "Connection to server sucessfully";
        $redis->set("str","hello world");
        echo $redis->get("str");
    }

}