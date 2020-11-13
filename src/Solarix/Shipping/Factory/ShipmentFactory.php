<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Shipment;
use Solarix\Shipping\Model\ShipmentInterface;
use Solarix\Shipping\Provider\BaseProvider;
use Solarix\Shipping\Provider\FedExProvider;

/**
 * Class ShipmentFactory
 *
 * Create Shipment instances
 *
 * @package Solarix\Shipping\Factory
 */
class ShipmentFactory extends AbstractFactory implements
  ShipmentFactoryInterface
{
  /**
   * @return ShipmentInterface
   */
  public function create(): ShipmentInterface
  {
    switch ($this->getProvider()) {
      case $this->getProvider() instanceof FedExProvider:
        return new \Solarix\Shipping\Provider\FedEx\Model\Shipment();
      case $this->getProvider() instanceof BaseProvider:
      default:
        return new Shipment();
    }
  }
}
