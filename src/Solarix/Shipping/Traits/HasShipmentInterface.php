<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShipmentInterface;

interface HasShipmentInterface
{
  /**
   * @return ShipmentInterface|null
   */
  public function getShipment(): ?ShipmentInterface;

  /**
   * @param ShipmentInterface|null $shipment
   *
   * @return void
   */
  public function setShipment(?ShipmentInterface $shipment): void;
}
