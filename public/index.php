<?php
/**
 * Phalcon Skeleton REST API Project: Front Controller
 */
use Phalcon\DI\FactoryDefault as DefaultDI;
use Phalcon\Config\Adapter\Ini as IniConfig;
use Phalcon\Loader;
use PhrestAPI\PhrestAPI;
use PhrestSkeleton\Common\API;

// Include the composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

// Handle the request
(new API())->handle();
