<?php
//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("192.168.33.60", 9502);

function onOpen($ws, $request)
{
    var_dump($request);
    echo "===============\r\n";
    $ws->push($request->fd, "你好用户" . $request->fd . "我们将持续为您报时");
    swoole_timer_tick(1000, function ($timeId) use (&$ws, &$request) {
        var_dump($timeId);
        $ws->push($request->fd, "当前时间是：" . date('y/m/d H:i:s'));
    });
}

//监听WebSocket连接打开事件
$ws->on('open',"onOpen");

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();