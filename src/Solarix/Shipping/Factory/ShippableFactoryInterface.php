<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\ShippableInterface;

interface ShippableFactoryInterface extends AbstractFactoryInterface
{
  public function create(): ShippableInterface;
}
