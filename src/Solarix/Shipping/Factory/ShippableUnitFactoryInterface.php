<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\ShippableUnitInterface;

interface ShippableUnitFactoryInterface extends AbstractFactoryInterface
{
  public function create(): ShippableUnitInterface;
}
