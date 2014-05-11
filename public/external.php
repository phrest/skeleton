<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PhrestSDK\SDK;

/**
 * Example external API usage
 *
 * In order to use the API externally (HTTP) you would need to configure the
 * SDK with a URL of the API App by calling SDK::setURL()
 */

// Prepare SDK
$sdk = new SDK();

// External call (using current host as example)
$sdk->setURL($_SERVER['HTTP_HOST']);

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
