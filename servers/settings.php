<?php


use Swoole\Constant;

$server = new Server('0.0.0.0', 9509);
$server->set(
    [
        Constant::OPTION_WORKER_NUM      => 1,
        Constant::OPTION_TASK_WORKER_NUM => 1,
    ]
);
