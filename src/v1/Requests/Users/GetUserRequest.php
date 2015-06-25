<?php

namespace Phrest\Skeleton\v1\Requests\Users;

use Phrest\SDK\Request\AbstractRequest;
use Phrest\SDK\Request\RequestOptions;
use Phrest\SDK\PhrestSDK;

class GetUserRequest extends AbstractRequest
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
   * @param  $id
   */
  public function __construct($id = null)
  {
    $this->id = $id;
  }

  /**
   *
   */
  public function create()
  {
    $requestOptions = new RequestOptions();
    if (!isset($this->id))
    {
      throw new \Exception("Parameter 'id' is required. It is a GET parameter.");
    }

    return PhrestSDK::getResponse(
      self::METHOD_GET,
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

}
