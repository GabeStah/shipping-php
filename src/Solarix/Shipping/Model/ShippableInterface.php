<?php

namespace Solarix\Shipping\Model;

interface ShippableInterface
{
  /**
   * Get shippable depth.
   *
   * @return float|null
   */
  public function getDepth(): ?float;

  /**
   * Set shippable depth.
   *
   * @param float|null $value
   *
   * @return ShippableInterface
   */
  public function setDepth(?float $value): ShippableInterface;

  /**
   * Get shippable height.
   *
   * @return float|null
   */
  public function getHeight(): ?float;

  /**
   * Set shippable height.
   *
   * @param float|null $value
   *
   * @return ShippableInterface
   */
  public function setHeight(?float $value): ShippableInterface;

  /**
   * Get shippable id.
   *
   * @return string|int|null
   */
  public function getId();

  /**
   * Set shippable id.
   *
   * @param string|int|null $value
   *
   * @return ShippableInterface
   */
  public function setId($value): ShippableInterface;

  /**
   * Get shippable quantity.
   *
   * @return int|null
   */
  public function getQuantity(): ?int;

  /**
   * Set shippable quantity.
   *
   * @param int|null $value
   *
   * @return ShippableInterface
   */
  public function setQuantity(?int $value): ShippableInterface;

  /**
   * Get shippable volume.
   *
   * @return float|null
   */
  public function getVolume(): ?float;

  /**
   * Get shippable weight.
   *
   * @return float|null
   */
  public function getWeight(): ?float;

  /**
   * Set shippable weight.
   *
   * @param float|null $value
   *
   * @return ShippableInterface
   */
  public function setWeight(?float $value): ShippableInterface;

  /**
   * Get shippable width.
   *
   * @return float|null
   */
  public function getWidth(): ?float;

  /**
   * Set shippable width.
   *
   * @param float|null $value
   *
   * @return ShippableInterface
   */
  public function setWidth(?float $value): ShippableInterface;
}
