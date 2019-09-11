<?php
//每隔2000ms触发一次
//$count = 1;
//$id = swoole_timer_tick(1000, function ($timer_id) use($count) {
//    echo "tick-1000ms\n";
//    if($count > 10){
//        swoole_timer_clear($timer_id);
//    }
//    $count ++;
//    var_dump($count);
//});
//var_dump($id);
////3000ms后执行此函数
//swoole_timer_after(3000, function () use ($id) {
//    echo "after 3000ms.\n";
//
//});

function onOpen($ws, $request)
{
    var_dump($request);
    echo "===============\r\n";
    $ws->push($request->fd, "你好用户" . $request->fd . "我们将持续为您报时");
    swoole_timer_tick(3000, function ($timeId) use (&$ws, &$request) {
        var_dump($timeId);
        $ws->push($request->fd, "当前时间是：" . date('y/m/d H:i:s'));
    });
}