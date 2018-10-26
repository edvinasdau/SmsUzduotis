<?php

use App\Sms\Counter as Counter;

require_once 'app/start.php';

$counter = new Counter();

$counter->count($argv[1]);
