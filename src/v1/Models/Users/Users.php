<?php

namespace Phrest\Skeleton\v1\Models\Users;

use Phalcon\Mvc\Model;

class Users extends Model
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
   *
   */
  public function initialize()
  {
    //todo
  }

  /**
   * @param mixed $params
   *
   * @return static
   */
  public static function findFirst($params = array())
  {
    return parent::findFirst($params);
  }

}
