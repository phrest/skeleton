<?php
/**
 * Phalcon Skeleton REST API Project: Front Controller
 */
use PhrestSkeleton\Common\API;
use PhrestSkeleton\Common\APIDI;

// Include the composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

// Handle the request
$di = new APIDI();
$app = new API($di);
$app->handle();
