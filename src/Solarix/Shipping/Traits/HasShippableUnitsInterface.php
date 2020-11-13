<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShippableUnitInterface;

interface HasShippableUnitsInterface
{
  /**
   * @param ShippableUnitInterface $shippableUnit
   *
   * @return void
   */
  public function addShippableUnit(ShippableUnitInterface $shippableUnit);

  /**
   * Count number of Shippables.
   *
   * @return int
   */
  public function countShippables(): int;

  /**
   * Number of ShippableUnits
   *
   * @return int
   */
  public function countShippableUnits(): int;

  /**
   * @return ShippableUnitInterface[]|null
   */
  public function getShippableUnits(): ?array;

  /**
   * @param ShippableUnitInterface[]|null $shippableUnits
   *
   * @return void
   */
  public function setShippableUnits(?array $shippableUnits): void;
}
