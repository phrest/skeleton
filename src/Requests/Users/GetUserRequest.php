<?php 
namespace PhrestSkeleton\Requests\Users;

use PhrestSkeleton\Common\SDK;
use \PhrestSDK\Request\RequestOptions;

/**
 * Get a User
 */
class GetUserRequest extends \PhrestSDK\Request\GETRequest
{

  /**
   * @return \PhrestSkeleton\Responses\Users\UserResponse
   */
  public static function get($id, RequestOptions $options = null)
  {
    return parent::getByPath("/v1/users/$id", $options);
  }


}
