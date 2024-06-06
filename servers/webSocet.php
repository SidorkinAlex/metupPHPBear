<?php

use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

$ws = new Server('0.0.0.0', 9502);
$ws->on('open', function ($ws, Request $request) {
    onConnection($request);
});
$ws->on('message', function ($ws, Frame $frame)  {
    onMessage($frame);
});
$ws->on('close', function ($ws, $id) {
    onClose($id);
});
$ws->on('workerStart', function (Server $ws) {
    onWorkerStart($ws);
});
$ws->start();





function onConnection(Request $request)
{

}
function onMessage(Frame $frame)
{

}

$ws->on('message', function ($ws, Frame $frame) {
    onMessage($frame);
});
function onClose($id)
{

}
function onWorkerStart(Server $ws)
{

}