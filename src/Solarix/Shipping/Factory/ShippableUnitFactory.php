<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\ShippableUnit;
use Solarix\Shipping\Model\ShippableUnitInterface;

/**
 * Class ShippableUnitFactory
 *
 * Create ShippableUnit instances
 *
 * @package Solarix\Shipping\Factory
 */
class ShippableUnitFactory extends AbstractFactory implements
  ShippableUnitFactoryInterface
{
  /**
   * @return ShippableUnitInterface
   */
  public function create(): ShippableUnitInterface
  {
    return new ShippableUnit();
  }
}
