<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Rate\RateInterface;

interface RateFactoryInterface
{
  public function create(): RateInterface;
}
