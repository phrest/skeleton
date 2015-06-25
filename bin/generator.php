<?php
use Phalcon\Config\Adapter\Yaml;
use Phrest\API\PhrestAPI;
use Phrest\SDK\Generator;
use Phrest\SDK\PhrestSDK;
use Phrest\Skeleton\Common\APIDI;
use Phrest\Skeleton\v1\Requests\Users\CreateUserRequest;

include dirname(__DIR__) . '/vendor/autoload.php';

$srcDir = dirname(__DIR__) . '/src/';

$sdk = new PhrestSDK($srcDir);

$generator = new Generator(
  $sdk,
  new Yaml($srcDir . '/Config/build.yaml'),
  'Phrest\\Skeleton'
);

if (in_array('--force', $argv))
{
  //This will cause the generator to overwrite files
  //By default it only adds if a file/function/property doesn't exist
  Generator::$force = true;
}

if (in_array('--test', $argv))
{
  $di = new APIDI();
  $di->setShared('sdk', $sdk);
  $app = new PhrestAPI($di, $srcDir);

  //Use internal calls
  $sdk->setApp($app);

  //Using constructor
  $responses[] = (new CreateUserRequest(
    'john', 'john@gmail.com', 'pass'
  ))->create();

  //Using setters
  $responses[] = (new CreateUserRequest())
  ->setName('jane')
  ->setEmail('jane@hotmail.com')
  ->setPassword('pass')
  ->create();

  //Using properties
  $request = new CreateUserRequest();
  $request->name = 'james';
  $request->email = 'james@yahoo.com';
  $request->password = 'pass';

  $responses[] = $request->create();

  print_r($responses);
  die;
}

$generator->generate();
