<?php

namespace Phrest\Skeleton\v1\Requests\Users;

use Phrest\SDK\Request\AbstractRequest;
use Phrest\SDK\Request\RequestOptions;
use Phrest\SDK\PhrestSDK;

class UpdateUserRequest extends AbstractRequest
{

    /**
     * @var string
     */
  private $path = '/v1/users/%s';

    /**
     * @var mixed
     */
  public $id = null;

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
   * @param        $id
   * @param string $name
   * @param string $email
   * @param string $password
   */
  public function __construct($id = null, $name = null, $email = null, $password = null)
  {
    $this->id = $id;
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
    if (!isset($this->id))
    {
    throw new \Exception("Parameter 'id' is required. It is a GET parameter.");
    }
    return PhrestSDK::getResponse(
    self::METHOD_PUT,
    sprintf($this->path, $this->id),
    $requestOptions
    );
  }

  /**
   * @param  $id
   *
   * @return static
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
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
