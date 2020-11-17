<?php

namespace Solarix\Shipping\Model;

use Solarix\Shipping\Traits\HasDestinationTrait;
use Solarix\Shipping\Traits\HasOriginTrait;
use Solarix\Shipping\Traits\HasShippableUnitsTrait;

/**
 * Class Shipment
 *
 * Core shipping model that encapsulates a full shipment.
 *
 * @package Solarix\Shipping
 */
class Shipment implements ShipmentInterface
{
  use HasDestinationTrait, HasOriginTrait, HasShippableUnitsTrait;
}
