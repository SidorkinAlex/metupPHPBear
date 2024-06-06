<?php
use Swoole\Constant;
use Swoole\Coroutine;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;
$server = new Server('0.0.0.0', 9501);
$server->on(
    'request',
    function (Request $request, Response $response) {
        if (!empty($request->get['sleep'])) {
            Coroutine::sleep((float) $request->get['sleep']); // Sleep for a while if HTTP query parameter "sleep" presents.
        }
        $response->status(234, 'Test');


        $response->end("123");
    }
);