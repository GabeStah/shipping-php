<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\ShippableInterface;

interface HasShippablesInterface
{
  /**
   * Add Shippable to collection.
   *
   * @param ShippableInterface|null $shippable
   */
  public function addShippable(?ShippableInterface $shippable);

  /**
   * Count Shippables in collection.
   *
   * @return int
   */
  public function countShippables(): int;

  /**
   * Get Shippables collection.
   *
   * @return ShippableInterface[]|null
   */
  public function getShippables(): ?array;

  /**
   * Determine if Shippable exists in Shippables collection.
   *
   * @param ShippableInterface $shippable
   *
   * @return bool
   */
  public function hasShippable(ShippableInterface $shippable);

  /**
   * Set Shippables collection.
   *
   * @param ShippableInterface[]|null $shippables
   *
   * @return void
   */
  public function setShippables(?array $shippables): void;

  /**
   * Update existing Shippable in collection.
   *
   * @param ShippableInterface $shippable
   *
   * @return bool
   */
  public function updateShippable(ShippableInterface $shippable);
}
