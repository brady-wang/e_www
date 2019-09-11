<?php
namespace www\swoole;


//创建Server对象，监听 127.0.0.1:9501端口
$serv = new Swoole\Server("192.168.33.60", 9501);

$serv->set(array(
    'reactor_num' => 2, //reactor thread num
    'worker_num' => 4,    //worker process num
    'backlog' => 128,   //listen backlog
    'max_request' => 50,
    'dispatch_mode' => 1,
    'heartbeat_idle_time'=>3
));

//监听连接进入事件
$serv->on('Connect', function ($serv, $fd) {
    echo "有客户端连接 ".$fd."\n";
});

//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
    echo "接受到客户端数据 ".$fd." -".$data;
    $serv->send($fd, "服务器返回数据: ".$data);
});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "客户端关闭连接.\n";
});

//启动服务器
$serv->start();