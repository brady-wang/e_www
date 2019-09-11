<?php

namespace Wang\Swoole;

use  Swoole\Http\Server;

class MySwoole
{
    private static $_instance;

    public $host;
    public $port;
    public $mode;
    public $sock_type;
    public $serv;

    private function  __construct()
    {


        return $this->serv = new Server( '192.168.33.60', 9501,  $mode = SWOOLE_PROCESS, $sock_type = SWOOLE_SOCK_TCP);
    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            return self::$_instance = new self;
        } else {
            return self::$_instance;
        }
    }

    //设置
    public function set($config)
    {
        $this->serv->set($config);
    }

    //连接
    public function onConnect($func)
    {
        $this->serv->on('connect',$func);
    }

    public function onReceive($func){
        $this->serv->on('receive',$func);
    }

    public function onClose()
    {
        $this->serv->on('close');
    }

    public function start()
    {
        $this->serv->start();
    }




}