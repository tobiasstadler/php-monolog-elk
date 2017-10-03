<?php

require 'vendor/autoload.php'; 

use Monolog\Formatter\LogstashFormatter;
use Monolog\Handler\SocketHandler;
use Monolog\Logger;

$logger = new Logger($argv[0]);

$logstashHandler = new SocketHandler('tcp://localhost:12345');
$logstashHandler->setFormatter(new LogstashFormatter('php-monolog-elk'));

$logger->pushHandler($logstashHandler);

$logger->{$argv[1]}(implode(' ', array_slice($argv, 2)));

