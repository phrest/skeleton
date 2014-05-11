<?php
/**
 * Users - If your database names are plural, "Users" just works out of the box.
 * Also, considering the URL structure of the API (/users), this works well
 */

namespace PhrestSkeleton\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
  public $id;
  public $name;

  public function initialize()
  {
    // $this->phoneNumbers will get UserPhoneNumbers
    $this->hasMany(
      "id",
      UserPhoneNumbers::class,
      "userId",
      ['alias' => 'phoneNumbers']
    );
  }
}
