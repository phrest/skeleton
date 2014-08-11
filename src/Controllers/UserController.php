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
use PhrestAPI\Exceptions\HandledException;
use PhrestSkeleton\Exceptions\Users\InvalidNameException;
use PhrestSkeleton\Exceptions\Users\UserNotFoundException;
use PhrestSkeleton\Models\Users;
use PhrestSkeleton\Responses\Users\UserResponse;
use PhrestSkeleton\Responses\Users\UsersResponse;

/**
 * UserController
 *
 * @name("Users")
 * @description("Manage users core information")
 */
class UserController extends RESTController
{

  /**
   * Get a list of Users
   *
   * GET: /v1/users
   *
   * @description('Get a list of users')
   *
   * @response("\PhrestSkeleton\Responses\Users\UsersResponse")
   */
  public function getUsers()
  {
    /** @var Users[] $users */
    $users = Users::find();

    // Building "Responses" allows for better
    // type hinting when using the API internally
    $responses = new UsersResponse();

    foreach($users as $user)
    {
      $response = new UserResponse(
        $user->id,
        $user->name
      );

      $responses->addResponse($response);
    }

    return $responses;
  }

  /**
   * Create a User
   *
   * POST: /v1/users
   *
   * @description('Create a user')
   *
   * @postParam("name")
   *
   * @response("\PhrestSkeleton\Responses\Users\UserResponse")
   */
  public function createUser()
  {
    $name = $this->request->getPost('name');
    if(!$name)
    {
      throw new InvalidNameException;
    }

    $user = new Users();
    $user->name = "Todo";
    $user->save();

    return new UserResponse($user->id, $user->name);
  }

  /**
   * Get a User
   *
   * GET: /v1/users/1
   *
   * @description('Get a User')
   *
   * @param $id
   * @methodParam('id')
   *
   * @uri("/$id")
   *
   * @throws \PhrestSkeleton\Exceptions\Users\UserNotFoundException
   *
   * @return \PhrestAPI\Responses\Response
   * @response("\PhrestSkeleton\Responses\Users\UserResponse")
   */
  public function getUser($id)
  {
    /** @var Users $user */
    $user = Users::findFirst($id);

    if(!$user)
    {
      throw new UserNotFoundException;
    }

    return new UserResponse($user->id, $user->name);
  }

  /**
   * Update a User
   *
   * PUT: /v1/users/1
   *
   * @param $id
   * @methodParam('id')
   *
   * @uri("/$id")
   *
   * @postParam("name")
   * @description("Update a user")
   *
   * @throws \PhrestAPI\Exceptions\HandledException
   * @return \PhrestSkeleton\Responses\Users\UserResponse
   * @response("\PhrestSkeleton\Responses\Users\UserResponse")
   */
  public function updateUser($id)
  {
    $updateFields = $this->request->getPost();
    if(count($updateFields) === 0)
    {
      throw new HandledException('Invalid Request', 400);
    }

    /** @var Users $user */
    $user = Users::findFirst($id);

    // Update name
    if(isset($updateFields['name']))
    {
      $user->name = $updateFields['name'];
    }

    $user->save();

    return new UserResponse($user->id, $user->name);
  }

  /**
   * Delete a User
   *
   * DELETE: /v1/users/1
   *
   * @description('Delete a user')
   *
   * @param $id
   * @methodParam('id')
   *
   * @uri("/$id")
   *
   * @response("\PhrestSkeleton\Responses\Users\UserResponse")
   */
  public function deleteUser($id)
  {
    // todo
    /** @var Users $user */
    $user = Users::findFirst($id);
    $user->delete();
  }
}
