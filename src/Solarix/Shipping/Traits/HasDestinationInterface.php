<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\AddressInterface;

interface HasDestinationInterface
{
  /**
   * Get destination.
   *
   * @return AddressInterface|null
   */
  public function getDestination(): ?AddressInterface;

  /**
   * Set destination.
   *
   * @param AddressInterface $value
   *
   * @return $this
   */
  public function setDestination(AddressInterface $value);
}
