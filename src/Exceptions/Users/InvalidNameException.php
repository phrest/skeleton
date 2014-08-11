<?php

namespace PhrestSkeleton\Exceptions\Users;
use PhrestAPI\Exceptions\ResourceNotFoundException;

class InvalidNameException extends ResourceNotFoundException
{
  protected $message = 'The name is invalid';
}
