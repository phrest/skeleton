<?php


namespace PhrestSkeleton\Responses\Users;

use PhrestAPI\Responses\Response;

class UserResponse extends Response
{
  /** @var int */
  public $id;

  /** @var string */
  public $name;

  public function __construct($id, $name)
  {
    $this->id = (int)$id;
    $this->name = $name;
  }
}
