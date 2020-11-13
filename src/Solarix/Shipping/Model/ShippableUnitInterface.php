<?php

namespace Solarix\Shipping\Model;

use Solarix\Shipping\Traits\HasShippablesInterface;

interface ShippableUnitInterface extends HasShippablesInterface
{
  /**
   * Get total depth of shippables.
   *
   * @return float|null
   */
  public function getDepth(): ?float;

  /**
   * Get total height of shippables.
   *
   * @return float|null
   */
  public function getHeight(): ?float;

  /**
   * Get total volume of shippables.
   *
   * @return float|null
   */
  public function getVolume(): ?float;

  /**
   * Get total weight of shippables.
   *
   * @return float|null
   */
  public function getWeight(): ?float;

  /**
   * Get total width of shippables.
   *
   * @return float|null
   */
  public function getWidth(): ?float;
}
