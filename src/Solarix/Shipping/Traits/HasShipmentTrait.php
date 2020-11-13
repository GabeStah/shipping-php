<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShipmentInterface;

trait HasShipmentTrait
{
  /**
   * @var ShipmentInterface|null
   */
  private $shipment;

  /**
   * @return ShipmentInterface|null
   */
  public function getShipment(): ?ShipmentInterface
  {
    return $this->shipment;
  }

  /**
   * @param ShipmentInterface|null $shipment
   *
   * @return void
   */
  public function setShipment(?ShipmentInterface $shipment): void
  {
    $this->shipment = $shipment;
  }
}
