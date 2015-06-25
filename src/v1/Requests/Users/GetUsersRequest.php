<?php

namespace Phrest\Skeleton\v1\Requests\Users;

use Phrest\SDK\Request\AbstractRequest;
use Phrest\SDK\Request\RequestOptions;
use Phrest\SDK\PhrestSDK;

class GetUsersRequest extends AbstractRequest
{

  /**
   * @var string
   */
  private $path = '/v1/users/';

  /**
   *
   */
  public function create()
  {
    $requestOptions = new RequestOptions();

    return PhrestSDK::getResponse(
      self::METHOD_GET,
      $this->path,
      $requestOptions
    );
  }

}
