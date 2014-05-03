<?php
/**
 * Phalcon Skeleton REST API Project: Front Controller
 */
use Phalcon\DI\FactoryDefault as DefaultDI,
  Phalcon\Config\Adapter\Ini as IniConfig,
  Phalcon\Loader;

// Include the composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';


/*
 * The DI is our direct injector.  It will store pointers to all of our services
 * and we will insert it into all of our controllers.
 * @var DefaultDI
 */
$di = new DefaultDI();

/*
 * $di's setShared method provides a singleton instance.
 * If the second parameter is a function, then the service is lazy-loaded
 * on its first instantiation.
 */
$di->setShared(
  'config',
  function ()
  {
    return new IniConfig(dirname(__DIR__) . "/src/Config/config.ini");
  }
);

/*
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set(
  'db',
  function () use ($di)
  {
    $config = $di->get('config');
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
$app = new \PhalconAPI\API($di);
$app->handle();
