<?php

namespace Phrest\Skeleton\Common;

use Phrest\API\PhrestAPI;
use Phrest\SDK\PhrestSDK;

class SDK extends PhrestSDK
{
  public $srcDir;

  public function __construct(APIDI $di)
  {
    // Configure the API App
    $this->setApp(new PhrestAPI($di));

    parent::__construct(realpath(__DIR__ . '/../'));
  }
}
