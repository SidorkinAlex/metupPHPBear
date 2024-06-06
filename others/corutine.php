<?php

\Co\run(function () {
    // Create channel
    $channel = new \Co\Channel();

    // Async download yahoo
    \Co\go(function() use($channel) {
        $client = new \Swoole\Coroutine\Http\Client('www.yahoo.fr', 80, false);
        $client->get('/');
        $yahooHtml = $client->getBody();
        $client->close();
        $channel->push('yahoo done');
    });

    \Co\go(function() use($channel) {
        $client = new \Swoole\Coroutine\Http\Client('www.google.fr', 80, false);
        $client->get('/');
        $yahooHtml = $client->getBody();
        $client->close();
        $channel->push('google done');
    });

    // Wait and notify
        for ($i = 0; $i < 2; $i++) {
            echo $channel->pop() . "\n";
        }
});