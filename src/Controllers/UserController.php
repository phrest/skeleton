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

namespace PhrestSkeleton\Controllers;

use PhrestAPI\Controllers\RESTController;
use PhrestSkeleton\Models\Users;

class UserController extends RESTController
{

  /**
   * List of allowed fields to be returned
   * @var array
   */
  protected $allowedPartialFields = [
    'getUser' => [
      'name'
    ]
  ];

  /**
   * List of fields that are allowed to be expanded
   * @var array
   */
  protected $allowedExpandedFields = [
    'getUser' => [
      'phoneNumbers'
    ]
  ];

  /**
   * Get a list of Users
   * GET: /v1/users
   */
  public function getUsers()
  {
    $users = Users::find();

    return $this->respondWithModels($users);
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

    return $this->respondWithModel($user, __FUNCTION__);
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
