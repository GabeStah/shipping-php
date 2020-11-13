<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Rate\RateRequestInterface;
use Solarix\Shipping\Model\ShipmentInterface;

interface RateRequestFactoryInterface
{
  public function create(ShipmentInterface $shipment): RateRequestInterface;
}
