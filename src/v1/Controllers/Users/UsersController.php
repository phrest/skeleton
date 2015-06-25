<?php

namespace Phrest\Skeleton\v1\Controllers\Users;

use Phrest\API\Controllers\RESTController;
use Phrest\Skeleton\v1\Exceptions\Users\InvalidParametersException;
use Phrest\Skeleton\v1\Models\Users\Users;
use Phrest\Skeleton\v1\Responses\Users\UserResponse;
use Phrest\Skeleton\v1\Exceptions\Users\UserNotFoundException;
use Phrest\Skeleton\v1\Responses\Users\UsersResponse;

class UsersController extends RESTController
{

  /**
   * Create a user
   * POST: /
   * @postParam ('name')
   * @postParam ('email')
   * @postParam ('password')
   *
   * @throws \Phrest\Skeleton\v1\Exceptions\Users\InvalidParametersException
   * @returns \Phrest\Skeleton\v1\Responses\Users\UserResponse
   */
  public function createUser()
  {
    $user = new Users();
    $user->name = $this->request->getPost('name', 'trim');
    $user->email = $this->request->getPost('email', 'trim');
    $user->password = $this->request->getPost('password', 'trim');
    if (!$user->save())
    {
      $exception = '';
      foreach ($user->getMessages() as $message)
      {
        $exception .= $message->getMessage();
      }
      throw new InvalidParametersException(
        'Invalid parameters supplied: ' . $exception
      );
    }

    return new UserResponse(
      $user->id, $user->name, $user->email, $user->password
    );
  }

  /**
   * Get a User
   * GET: /{id:[0-9]+}
   *
   * @param $id
   *
   * @throws \Phrest\Skeleton\v1\Exceptions\Users\UserNotFoundException
   * @returns \Phrest\Skeleton\v1\Responses\Users\UserResponse
   */
  public function getUser($id)
  {
    $user = Users::findFirst($id);
    if (!$user)
    {
      throw new UserNotFoundException('The user you requested could not be found');
    }

    return new UserResponse(
      $user->id, $user->name, $user->email, $user->password
    );
  }

  /**
   * Get a list of users
   * GET: /
   *
   * @returns \Phrest\Skeleton\v1\Responses\Users\UsersResponse
   */
  public function getUsers()
  {
    $response = new UsersResponse();
    foreach (Users::find() as $user)
    {
      $response->addResponse(
        new UserResponse(
          $user->id, $user->name, $user->email, $user->password
        ));
    }

    return $response;
  }

  /**
   * Update a user
   * PUT: /{id:[0-9]+}
   *
   * @param $id
   * @postParam ('name')
   * @postParam ('email')
   * @postParam ('password')
   *
   * @throws \Phrest\Skeleton\v1\Exceptions\Users\UserNotFoundException
   * @returns \Phrest\Skeleton\v1\Responses\Users\UserResponse
   */
  public function updateUser($id)
  {
    $user = Users::findFirst($id);
    if (!$user)
    {
      throw new UserNotFoundException('The user you requested could not be found and updated');
    }
    $user->name = $this->request->getPost('name', 'trim');
    $user->email = $this->request->getPost('email', 'trim');
    $user->password = $this->request->getPost('password', 'trim');
    if (!$user->save())
    {
      $exception = '';
      foreach ($user->getMessages() as $message)
      {
        $exception .= $message->getMessage();
      }
      throw new InvalidParametersException(
        'Invalid parameters supplied: ' . $exception
      );
    }

    return new UserResponse(
      $user->id, $user->name, $user->email, $user->password
    );
  }

  /**
   * Delete a user
   * DELETE: /{id:[0-9]+}
   *
   * @param $id
   *
   * @throws \Phrest\Skeleton\v1\Exceptions\Users\UserNotFoundException
   * @returns \Phrest\Skeleton\v1\Responses\Users\UserResponse
   */
  public function deleteUser($id)
  {
    $user = Users::findFirst($id);
    if (!$user)
    {
      throw new UserNotFoundException('The user you requested could not be found and deleted');
    }
    $user->delete();

    return new UserResponse(
      $user->id, $user->name, $user->email, $user->password
    );
  }

}
