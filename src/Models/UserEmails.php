<?php
/**
 * UserEmails - If your database names are plural, "UsersEmails" just works out of the box.
 */

namespace PhalconAPISkeleton\Models;

use Phalcon\Mvc\Model;

class UserEmails extends Model
{
  public $id;
  public $userId;
  public $email;

  public function initialize()
  {
    // $this->user will return a User
    $this->belongsTo(
      "userId",
      Users::class,
      "id",
      ['alias' => 'user']
    );
  }
}
