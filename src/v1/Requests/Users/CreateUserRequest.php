<?php

namespace Phrest\Skeleton\v1\Requests\Users;

use Phrest\SDK\Request\AbstractRequest;
use Phrest\SDK\Request\RequestOptions;
use Phrest\SDK\PhrestSDK;

class CreateUserRequest extends AbstractRequest
{

  /**
   * @var string
   */
  private $path = '/v1/users/';

  /**
   * @var string
   */
  public $name = null;

  /**
   * @var string
   */
  public $email = null;

  /**
   * @var string
   */
  public $password = null;

  /**
   * @param string $name
   * @param string $email
   * @param string $password
   */
  public function __construct($name = null, $email = null, $password = null)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  /**
   *
   */
  public function create()
  {
    $requestOptions = new RequestOptions();
    $requestOptions->addPostParams(
      [
        'name' => $this->name,
        'email' => $this->email,
        'password' => $this->password,
      ]
    );

    return PhrestSDK::getResponse(
      self::METHOD_POST,
      $this->path,
      $requestOptions
    );
  }

  /**
   * @param string $name
   *
   * @return static
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @param string $email
   *
   * @return static
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * @param string $password
   *
   * @return static
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

}
