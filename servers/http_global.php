<?php
use Swoole\Constant;
use Swoole\Coroutine;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;
$counter=0;
//глобальный контекст


$table = new Swoole\Table(1024);
$table->column('id', Swoole\Table::TYPE_INT, 4);       //1,2,4,8
$table->column('name', Swoole\Table::TYPE_STRING, 64);
$table->column('num', Swoole\Table::TYPE_FLOAT);
$table->create();

$table->set('tianfenghan@qq.com', array('id' => 145, 'name' => 'rango', 'num' => 3.1415));
$table->set('350749960@qq.com', array('id' => 358, 'name' => "Rango1234", 'num' => 3.1415));
$table->set('hello@qq.com', array('id' => 189, 'name' => 'rango3', 'num' => 3.1415));

$data = $table->get('350749960@qq.com');
$table->del('hello@qq.com');



$server = new Server('0.0.0.0', 9501);
$server->on(
    'request',
    function (Request $request, Response $response) use (&$counter){
        $counter++;

        $response->end("<h1> {$counter} </h1>");
    }
);
$server->start();