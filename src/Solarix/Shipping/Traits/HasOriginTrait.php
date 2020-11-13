<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\AddressInterface;

trait HasOriginTrait
{
  /** @var AddressInterface */
  protected $origin;

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
