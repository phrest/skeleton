<?php
/**
 * Handles the requests in /src/Controllers/UserController.php
 *
 * /v1/users
 * - GET: Gets a list of users
 * - POST: Create a user
 *
 * /v1/users/1
 * - GET: Gets "User 1"
 * - PUT: Updates "User 1"
 * - DELETE: Deleted "User 1"
 */
return call_user_func(
  function ()
  {

    $userCollection = new \Phalcon\Mvc\Micro\Collection();

    $userCollection
      // It is advised to use a version number i.e. /v1/ in the URL
      ->setPrefix('/v1/users')
      // Must be a string in order to support lazy loading
      ->setHandler('PhalconAPISkeleton\Controllers\UserController')
      ->setLazy(true);

    // Get list of Users
    $userCollection->get('/', 'getUsers');

    // Create User
    $userCollection->post('/', 'createUser');

    // Get User by id
    $userCollection->get('/{id:[0-9]+}', 'getUser');

    // Delete User
    $userCollection->delete('/{id:[0-9]+}', 'deleteUser');

    // Update User
    $userCollection->put('/{id:[0-9]+}', 'updateUser');

    return $userCollection;
  }
);
