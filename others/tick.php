<?php


Swoole\Timer::tick(1000, "run", ["param1", "param2"]);

// After 5s execute the run function, only once
Swoole\Timer::after(5000, "run", ["param3", "param4"]);