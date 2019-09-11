<?php
//$redis = new Swoole\Redis;
//$redis->connect('192.168.33.50', 6379, function ($redis, $result) {
//    $redis->set('test_key', 'value', function ($redis, $result) {
//        $redis->get('test_key', function ($redis, $result) {
//            var_dump($result);
//        });
//    });
//});


const REDIS_SERVER_HOST = '192.168.33.50';
const REDIS_SERVER_PORT = 6379;


go(function () {
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect(REDIS_SERVER_HOST, REDIS_SERVER_PORT);
    $redis->setDefer();
    $redis->set('name', 'test');

    $redis2 = new Swoole\Coroutine\Redis();
    $redis2->connect(REDIS_SERVER_HOST, REDIS_SERVER_PORT);
    $redis2->setDefer();
    $redis2->get('name');

    $result1 = $redis->recv();
    $result2 = $redis2->recv();

    var_dump($result1, $result2);
});

go(function () {
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect(REDIS_SERVER_HOST, REDIS_SERVER_PORT);
    $redis->multi();
    $redis->set('key3', 'rango');
    $redis->get('key1');
    $redis->get('key2');
    $redis->get('key3');

    $result = $redis->exec();
    var_dump($result);
});