<?php

namespace Solarix\Shipping\Provider\FedEx\Model;

use Solarix\Shipping\Model\AddressInterface;
use Solarix\Shipping\Traits\HasShippableUnitsTrait;
use Solarix\Shipping\Model\Shipment as BaseShipment;

/**
 * Class Shipment
 *
 * Core shipping model that encapsulates a full shipment.
 *
 * @package App\Solarix\Models\Shipping
 */
class Shipment extends BaseShipment
{
  use HasShippableUnitsTrait;

  /** @var AddressInterface */
  protected $destination;
  /** @var AddressInterface */
  protected $origin;

  /**
   * Get receiver.
   *
   * @return AddressInterface|null
   */
  public function getDestination(): ?AddressInterface
  {
    return $this->destination;
  }

  /**
   * Set receiver.
   *
   * @param AddressInterface $value
   *
   * @return $this
   */
  public function setDestination(AddressInterface $value)
  {
    $this->destination = $value;
    return $this;
  }

  /**
   * Get sender.
   *
   * @return AddressInterface|null
   */
  public function getOrigin(): ?AddressInterface
  {
    return $this->origin;
  }

  /**
   * Set sender.
   *
   * @param AddressInterface $value
   *
   * @return $this
   */
  public function setOrigin(AddressInterface $value)
  {
    $this->origin = $value;
    return $this;
  }
}
