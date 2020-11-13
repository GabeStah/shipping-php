<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\AddressInterface;

interface HasOriginInterface
{
  /**
   * Get sender.
   *
   * @return AddressInterface|null
   */
  public function getOrigin(): ?AddressInterface;

  /**
   * Set sender.
   *
   * @param AddressInterface $value
   *
   * @return $this
   */
  public function setOrigin(AddressInterface $value);
}
