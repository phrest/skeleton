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


use PhalconAPISkeleton\Models\Users;

class UserController
{
  /**
   * Get a list of Users
   * GET: /v1/users
   */
  public function getUsers()
  {
    // todo
    return Users::find();
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
    // todo
    return Users::findFirst($id);
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
