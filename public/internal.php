<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PhrestAPI\API;
use Phalcon\DI\FactoryDefault as DefaultDI;
use PhrestSDK\SDK;

/**
 * Example internal API usage
 *
 * In order to use the API locally you would need to configure the SDK with
 * an instance of the API App by calling SDK::setApp() this could be added
 * as a service in Phalcon DI.
 *
 * Alternatively, if you simply want to access the API over HTTP you can call
 * the SDK::setURL() method.
 */

/*
 * The DI is our direct injector.  It will store pointers to all of our services
 * and we will insert it into all of our controllers.
 * @var DefaultDI
 */
$apiDi = new DefaultDI();

/*
 * $di's setShared method provides a singleton instance.
 * If the second parameter is a function, then the service is lazy-loaded
 * on its first instantiation.
 */
$apiDi->setShared(
  'config',
  function ()
  {
    return new \Phalcon\Config\Adapter\Ini(dirname(__DIR__) . "/src/Config/config.ini");
  }
);

/*
 * Database connection is created based in the parameters
 * defined in the configuration file
 */
$apiDi->set(
  'db',
  function () use ($apiDi)
  {
    $config = $apiDi->get('config');
    return new \Phalcon\Db\Adapter\Pdo\Mysql(
      array(
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->name
      )
    );
  }
);

/*
 * Bootstrap the Phalcon REST API Application
 */
$app = new API($apiDi);

// Prepare SDK
$sdk = new SDK();

// External call
//$sdk->setURL('http://api.my-domain.dev');

// Internal call
$sdk->setApp($app);

// Get the response
$response = $sdk->get('/v1/users');

// Present response data
echo '<h1>Response Example</h1>';
printf('<p>Response is returned as "%s" </p>', get_class($response));

// Status Code
echo '<h2>Status Code</h2>';
echo '<p>Response status code is returned as a HTTP status code.</p>';
var_dump($response->meta->statusCode);
echo '<br>';
var_dump($response->meta->statusMessage);
echo '<hr>';

// Meta
printf(
  '<h2>Meta</h2> <pre>%s</pre><hr>',
  print_r($response->meta, true)
);

// Data
echo '<h2>Data</h2>';
echo '<p>Data is returned as an array or stdClass</p>';

printf('<pre>%s</pre>', print_r($response->data, true));
echo '<hr>';

// Messages
echo '<h2>Messages</h2>';
echo '<p>Data is returned as an array of ResponseMessage objects</p>';

printf('<pre>%s</pre>', print_r($response->messages, true));
echo '<hr>';
