<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShippableInterface;

trait HasShippablesTrait
{
  /**
   * @var ShippableInterface[]|null
   */
  private $shippables;

  /**
   * Add Shippable to collection.
   *
   * @param ShippableInterface|null $shippable
   * @param bool                    $upsert If true updates existing Shippable rather than adding new entry.
   */
  public function addShippable(
    ?ShippableInterface $shippable,
    bool $upsert = false
  ) {
    if ($upsert && $this->hasShippable($shippable)) {
      $this->updateShippable($shippable);
    } else {
      $this->shippables[] = $shippable;
    }
  }

  /**
   * Count Shippables in collection.
   *
   * @return int
   */
  public function countShippables(): int
  {
    if ($this->getShippables()) {
      return array_reduce($this->getShippables(), function (
        $carry,
        ShippableInterface $shippable
      ) {
        $carry += $shippable->getQuantity();
        return $carry;
      });
    }
    return 0;
  }

  /**
   * Get Shippables collection.
   *
   * @return ShippableInterface[]|null
   */
  public function getShippables(): ?array
  {
    return $this->shippables;
  }

  /**
   * Determine if Shippable exists in Shippables collection.
   *
   * @param ShippableInterface $shippable
   *
   * @return bool
   */
  public function hasShippable(ShippableInterface $shippable): bool
  {
    if ($this->getShippables()) {
      foreach ($this->getShippables() as $existing) {
        if ($existing->getId() === $shippable->getId()) {
          return true;
        }
      }
    }
    return false;
  }

  /**
   * Set Shippables collection.
   *
   * @param ShippableInterface[]|null $shippables
   *
   * @return void
   */
  public function setShippables(?array $shippables): void
  {
    $this->shippables = $shippables;
  }

  /**
   * Update existing Shippable in collection.
   *
   * @param ShippableInterface $shippable
   *
   * @return bool
   */
  public function updateShippable(ShippableInterface $shippable): bool
  {
    foreach ($this->getShippables() as $key => $existing) {
      if ($existing->getId() === $shippable->getId()) {
        $this->getShippables()[$key] = $shippable;
        return true;
      }
    }
    return false;
  }
}
