<?php

namespace Wang\Swoole;

require_once './MySwoole.php';



function connect($serv, $fd)
{
    echo "Client: Connect.\n";
}

function receive($serv, $fd, $from_id, $data)
{
    $serv->send($fd, "Server: ".$data);
}


function close($serv, $fd)
{
    echo "客户端".$fd."关闭";
}


$serv = MySwoole::getInstance();

$serv->onConnect("connect");
$serv->onConnect("receive");
$serv->onConnect("close");




