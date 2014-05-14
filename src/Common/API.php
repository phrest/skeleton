<?php


namespace PhrestSkeleton\Common;


use PhrestAPI\Collections\Collection;
use PhrestAPI\Collections\CollectionRoute;
use PhrestAPI\PhrestAPI;
use Phalcon\DI\FactoryDefault as DefaultDI;
use Phalcon\Config\Adapter\Ini as IniConfig;
use Phalcon\Db\Adapter\Pdo\Mysql as MySQLAdapter;

class API extends PhrestAPI
{

  public function __construct()
  {

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
        return new MySQLAdapter(
          array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->name
          )
        );
      }
    );

    // Hand off to PhrestAPI
    return parent::__construct($di, dirname(__DIR__));
  }

  /**
   * Main method to return the collections
   *
   * @return \PhrestAPI\Collections\Collection[]
   */
  public function getCollections()
  {
    return [
      $this->getUsersCollection(),
    ];
  }

  /**
   * Get the /v1/users Collection
   *
   * @return Collection
   */
  protected function getUsersCollection()
  {
    // Collection
    $collection = new Collection();
    $collection->name = 'Users';
    $collection->prefix = '/v1/users';
    $collection->controller = 'PhrestSkeleton\Controllers\UserController';

    // Get list of Users
    $collection->routes[] = CollectionRoute::get('/', 'getUsers');

    // Create User
    $collection->routes[] = CollectionRoute::post('/', 'createUser');

    // Get User by ID
    $collection->routes[] = CollectionRoute::get('/{id:[0-9]+}', 'getUser');

    // Delete User
    $collection->routes[] = CollectionRoute::delete(
      '/{id:[0-9]+}',
      'deleteUser'
    );

    // Update User
    $collection->routes[] = CollectionRoute::put('/{id:[0-9]+}', 'updateUser');

    return $collection;
  }
}
