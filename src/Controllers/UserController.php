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


class UserController
{
  /**
   * Get a list of Users
   * GET: /v1/users
   */
  public function getUsers()
  {

  }

  /**
   * Create a User
   * POST: /v1/users
   */
  public function createUser()
  {

  }

  /**
   * Get a User
   * GET: /v1/users/1
   * @param $id
   */
  public function getUser($id)
  {

  }

  /**
   * Update a User
   * PUT: /v1/users/1
   * @param $id
   */
  public function updateUser($id)
  {

  }

  /**
   * Delete a User
   * DELETE: /v1/users/1
   * @param $id
   */
  public function deleteUser($id)
  {

  }
}
