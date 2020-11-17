<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Rate\Rate;
use Solarix\Shipping\Model\Rate\RateInterface;
use Solarix\Shipping\Provider\BaseProvider;
use Solarix\Shipping\Provider\FedExProvider;

class RateFactory extends AbstractFactory implements RateFactoryInterface
{
  public function create(): RateInterface
  {
    switch ($this->getProvider()) {
      case $this->getProvider() instanceof FedExProvider:
        return new \Solarix\Shipping\Provider\FedEx\Model\Rate\Rate();
      case $this->getProvider() instanceof BaseProvider:
      default:
        return new Rate();
    }
  }
}
