<?php
/**
 * Phalcon Skeleton REST API Project: Front Controller
 */
use Phrest\API\PhrestAPI;
use Phrest\Skeleton\Common\APIDI;

// Include the composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

// Handle the request
$di = new APIDI();
$app = new PhrestAPI($di);
$app->handle();
