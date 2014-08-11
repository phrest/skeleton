<?php 
namespace PhrestSkeleton\Requests\Users;

use PhrestSkeleton\Common\SDK;
use \PhrestSDK\Request\RequestOptions;

/**
 * Create a user
 */
class CreateUserRequest extends \PhrestSDK\Request\POSTRequest
{

  public $name;

  public function __construct()
  {
    $this->path = "/v1/users/";
  }

  /**
   * @return \PhrestSkeleton\Responses\Users\UserResponse
   */
  public function create()
  {
    // todo this is here for ease of use for now, in future it will not use
    // the parent method, it will simply handle everything here
    $options = new RequestOptions();
    $options->addPostParams(call_user_func("get_object_vars", $this));
    return parent::createByPath($this->path, $options);
  }


}
