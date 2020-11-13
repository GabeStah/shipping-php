<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Rate\Rate;
use Solarix\Shipping\Model\Rate\RateInterface;

class RateFactory extends AbstractFactory implements RateFactoryInterface
{
  public function create(): RateInterface
  {
    return new Rate();
  }
}
