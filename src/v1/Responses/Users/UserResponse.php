<?php

namespace Phrest\Skeleton\v1\Responses\Users;

use Phrest\API\Responses\Response;

class UserResponse extends Response
{

  /**
   * @var int
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
   * @param int    $id
   * @param string $name
   * @param string $email
   * @param string $password
   */
  public function __construct($id, $name, $email, $password)
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    parent::__construct();
  }

}
