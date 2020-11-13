<?php

namespace Solarix\Shipping\Model;

interface RequestableInterface
{
  public function createRequest();

  public function makeRequest();

  public function wasReplySuccessful();
}
