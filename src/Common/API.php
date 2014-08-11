<?php


namespace PhrestSkeleton\Common;


use PhrestAPI\Collections\Collection;
use PhrestAPI\Collections\CollectionRoute;
use PhrestAPI\PhrestAPI;
use Phalcon\DI\FactoryDefault as DefaultDI;


class API extends PhrestAPI
{

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
    //$collection->name = 'Users';
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
