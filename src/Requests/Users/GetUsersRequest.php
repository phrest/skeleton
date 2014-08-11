<?php 
namespace PhrestSkeleton\Requests\Users;

use PhrestSkeleton\Common\SDK;
use \PhrestSDK\Request\RequestOptions;

/**
 * Get a list of users
 */
class GetUsersRequest extends \PhrestSDK\Request\GETRequest
{

  /**
   * @return \PhrestSkeleton\Responses\Users\UsersResponse
   */
  public static function get(RequestOptions $options = null)
  {
    return parent::getByPath("/v1/users/", $options);
  }


}
