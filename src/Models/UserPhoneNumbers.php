<?php
/**
 * UserPhoneNumbers - If your database names are plural, this just works out of the box.
 */

namespace PhrestSkeleton\Models;

use Phalcon\Mvc\Model;

class UserPhoneNumbers extends Model
{
  public $id;
  public $phoneNumber;

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
