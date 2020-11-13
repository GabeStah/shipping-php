<?php

namespace Solarix\Shipping\Model;

/**
 * Class Shippable
 *
 * Shippable entity, such as a product, digital service, etc
 *
 * @package Solarix\Shipping\Model
 */
class Shippable implements ShippableInterface
{
  private $depth;
  private $height;
  private $id;
  private $quantity = 1;
  private $weight;
  private $width;

  /**
   * @inheritDoc
   */
  public function getDepth(): ?float
  {
    return $this->depth;
  }

  /**
   * @inheritDoc
   */
  public function setDepth(?float $value): ShippableInterface
  {
    $this->depth = $value;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function getHeight(): ?float
  {
    return $this->height;
  }

  /**
   * @inheritDoc
   */
  public function setHeight(?float $value): ShippableInterface
  {
    $this->height = $value;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function getId(): ?float
  {
    return $this->id;
  }

  /**
   * @inheritDoc
   */
  public function setId($value): ShippableInterface
  {
    $this->id = $value;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function getQuantity(): ?int
  {
    return $this->quantity;
  }

  /**
   * @inheritDoc
   */
  public function setQuantity(?int $value): ShippableInterface
  {
    $this->quantity = $value;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function getVolume(): ?float
  {
    return $this->getDepth() * $this->getHeight() * $this->getWidth();
  }

  /**
   * @inheritDoc
   */
  public function getWeight(): ?float
  {
    return $this->weight;
  }

  /**
   * @inheritDoc
   */
  public function setWeight(?float $value): ShippableInterface
  {
    $this->weight = $value;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function getWidth(): ?float
  {
    return $this->width;
  }

  /**
   * @inheritDoc
   */
  public function setWidth(?float $value): ShippableInterface
  {
    $this->width = $value;
    return $this;
  }
}
