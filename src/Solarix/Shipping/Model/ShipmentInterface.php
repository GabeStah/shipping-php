<?php

namespace Solarix\Shipping\Model;

use Solarix\Shipping\Traits\HasOriginInterface;
use Solarix\Shipping\Traits\HasShippableUnitsInterface;
use Solarix\Shipping\Traits\HasDestinationInterface;

interface ShipmentInterface extends
  HasDestinationInterface,
  HasOriginInterface,
  HasShippableUnitsInterface
{
}
