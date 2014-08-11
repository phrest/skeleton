<?php


namespace PhrestSkeleton\Common;


use PhrestSDK\PhrestSDK;

class SDK extends PhrestSDK
{
  public $srcDir;

  public function __construct(APIDI $di)
  {
    // Configure the API App
    $this->setApp(new API($di));

    parent::__construct(realpath(__DIR__));
  }
}
