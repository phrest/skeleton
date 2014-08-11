#!/usr/bin/php
<?php
/**
 * Used to generate new Request classes
 * Request classes are great if you include the API as part of your app
 * as they save you from manually making requests over HTTP
 */
use PhrestSDK\Generator;
use PhrestSkeleton\Common\SDK;
use PhrestSkeleton\Common\APIDI;

// Include the composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

putenv('ENV=dev');
$sdk = new SDK(new APIDI());
$generator = new Generator($sdk, 'PhrestSkeleton');
$generator->setOutputDir(dirname(__DIR__) . '/src/');
$generator->generate();
