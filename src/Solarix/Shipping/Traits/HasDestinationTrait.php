<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\AddressInterface;

trait HasDestinationTrait
{
  /** @var AddressInterface */
  protected $destination;

  /**
   * Get destination.
   *
   * @return AddressInterface|null
   */
  public function getDestination(): ?AddressInterface
  {
    return $this->destination;
  }

  /**
   * Set destination.
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
}
