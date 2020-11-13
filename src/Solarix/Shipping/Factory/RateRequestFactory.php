<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Rate\RateRequest;
use Solarix\Shipping\Model\Rate\RateRequestInterface;
use Solarix\Shipping\Model\ShipmentInterface;
use Solarix\Shipping\Provider\BaseProvider;
use Solarix\Shipping\Provider\FedExProvider;

class RateRequestFactory extends AbstractFactory implements
  RateRequestFactoryInterface
{
  public function create(ShipmentInterface $shipment): RateRequestInterface
  {
    switch ($this->getProvider()) {
      case $this->getProvider() instanceof FedExProvider:
        return new \Solarix\Shipping\Provider\FedEx\Model\Rate\RateRequest(
          $shipment,
          new RateFactory($this->getProvider())
        );
      case $this->getProvider() instanceof BaseProvider:
      default:
        return new RateRequest(
          $shipment,
          new RateFactory($this->getProvider())
        );
    }
  }
}
