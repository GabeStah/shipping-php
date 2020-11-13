<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\ShipmentInterface;

interface ShipmentFactoryInterface extends AbstractFactoryInterface
{
  public function create(): ShipmentInterface;
}
