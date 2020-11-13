<?php

namespace Solarix\Shipping\Model;

use Solarix\Shipping\Traits\HasShippablesTrait;

class ShippableUnit implements ShippableUnitInterface
{
  use HasShippablesTrait;

  /**
   * @inheritDoc
   */
  public function getDepth(): ?float
  {
    return array_reduce($this->getShippables(), function (
      $carry,
      ?ShippableInterface $item
    ) {
      $carry += $item->getDepth();
      return $carry;
    });
  }

  /**
   * @inheritDoc
   */
  public function getHeight(): ?float
  {
    return array_reduce($this->getShippables(), function (
      $carry,
      ?ShippableInterface $item
    ) {
      $carry += $item->getHeight();
      return $carry;
    });
  }

  /**
   * @inheritDoc
   */
  public function getVolume(): ?float
  {
    return array_reduce($this->getShippables(), function (
      $carry,
      ?ShippableInterface $item
    ) {
      $carry += $item->getVolume();
      return $carry;
    });
  }

  /**
   * @inheritDoc
   */
  public function getWeight(): ?float
  {
    return array_reduce($this->getShippables(), function (
      $carry,
      ?ShippableInterface $item
    ) {
      $carry += $item->getWeight();
      return $carry;
    });
  }

  /**
   * @inheritDoc
   */
  public function getWidth(): ?float
  {
    return array_reduce($this->getShippables(), function (
      $carry,
      ?ShippableInterface $item
    ) {
      $carry += $item->getWidth();
      return $carry;
    });
  }
}
