<?php 
namespace PhrestSkeleton\Requests\Users;

use PhrestSkeleton\Common\SDK;
use \PhrestSDK\Request\RequestOptions;

/**
 * Delete a user
 */
class DeleteUserRequest extends \PhrestSDK\Request\DELETERequest
{

  /**
   * @return \PhrestSkeleton\Responses\Users\UserResponse
   */
  public static function delete($id, RequestOptions $options = null)
  {
    return parent::deleteByPath("/v1/users/$id", $options);
  }


}
