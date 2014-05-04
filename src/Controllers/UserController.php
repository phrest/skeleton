<?php
/**
 * Handles the requests that are defined in
 * /src/Collections/users.php
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

namespace PhalconAPISkeleton\Controllers;


use PhalconAPI\Controllers\RESTController;
use PhalconAPISkeleton\Models\Users;

class UserController extends RESTController
{
  /**
   * Get a list of Users
   * GET: /v1/users
   */
  public function getUsers()
  {
    $users = Users::find();

    return $this->respond($users);
  }

  /**
   * Create a User
   * POST: /v1/users
   */
  public function createUser()
  {
    // todo
    $user = new Users();
    $user->name = "Todo";
    $user->save();
  }

  /**
   * Get a User
   * GET: /v1/users/1
   * @param $id
   */
  public function getUser($id)
  {
    $user = Users::findFirst($id);

    return $this->respond($user);
  }

  /**
   * Update a User
   * PUT: /v1/users/1
   * @param $id
   */
  public function updateUser($id)
  {
    // todo
    /** @var Users $user */
    $user = Users::findFirst($id);
    $user->name = "Todo";
    $user->save();
  }

  /**
   * Delete a User
   * DELETE: /v1/users/1
   * @param $id
   */
  public function deleteUser($id)
  {
    // todo
    /** @var Users $user */
    $user = Users::findFirst($id);
    $user->delete();
  }
}
