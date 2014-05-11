<?php

namespace PhrestSkeleton\Exceptions\Users;
use PhrestAPI\Exceptions\ResourceNotFoundException;

class UserNotFoundException extends ResourceNotFoundException
{
  protected $message = 'The user you requested could not be found';
}
