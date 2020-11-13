<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShippableUnitInterface;

trait HasShippableUnitsTrait
{
  /**
   * @var ShippableUnitInterface[]|null
   */
  private $shippableUnits;

  /**
   * @param ShippableUnitInterface $shippableUnit
   *
   * @return void
   */
  public function addShippableUnit(ShippableUnitInterface $shippableUnit): void
  {
    $this->shippableUnits[] = $shippableUnit;
  }

  /**
   * Count number of ShippableUnits.
   *
   * @return int
   */
  public function countShippableUnits(): int
  {
    return count($this->shippableUnits);
  }

  /**
   * Count number of Shippables.
   *
   * @return int
   */
  public function countShippables(): int
  {
    if ($this->getShippableUnits()) {
      return array_reduce($this->getShippableUnits(), function (
        $carry,
        ShippableUnitInterface $shippableUnit
      ) {
        $carry += $shippableUnit->countShippables();
        return $carry;
      });
    }

    return 0;
  }

  /**
   * @return ShippableUnitInterface[]|null
   */
  public function getShippableUnits(): ?array
  {
    return $this->shippableUnits;
  }

  /**
   * @param ShippableUnitInterface[]|null $shippableUnits
   *
   * @return void
   */
  public function setShippableUnits(?array $shippableUnits): void
  {
    $this->shippableUnits = $shippableUnits;
  }
}
