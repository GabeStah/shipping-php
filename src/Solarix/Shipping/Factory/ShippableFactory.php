<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Shippable;
use Solarix\Shipping\Model\ShippableInterface;

/**
 * Class ShippableFactory
 *
 * Create Shippable instances
 *
 * @package Solarix\Shipping\Factory
 */
class ShippableFactory extends AbstractFactory implements
  ShippableFactoryInterface
{
  /**
   * @return ShippableInterface
   */
  public function create(): ShippableInterface
  {
    return new Shippable();
  }
}
