<?php

$http = new Swoole\Http\Server("192.168.33.60", 9501);

$http->on('request', function ($request, $response) {
    var_dump($request->server);
    if ($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico') {
        return $response->end();
    }
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();