<?php 
namespace PhrestSkeleton\Requests\Users;

use PhrestSkeleton\Common\SDK;
use \PhrestSDK\Request\RequestOptions;

/**
 * Update a user
 */
class UpdateUserRequest extends \PhrestSDK\Request\PUTRequest
{

  public $name;

  public function __construct($id)
  {
    $this->path = "/v1/users/$id";
  }

  /**
   * @return \PhrestSkeleton\Responses\Users\UserResponse
   */
  public function set($id)
  {
    // todo this is here for ease of use for now, in future it will not use
    // the parent method, it will simply handle everything here
    $options = new RequestOptions();
    $options->addPostParams(call_user_func("get_object_vars", $this));
    return parent::setByPath($this->path, $options);
  }


}
