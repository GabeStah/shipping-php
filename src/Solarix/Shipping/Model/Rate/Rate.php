<?php

namespace Solarix\Shipping\Model\Rate;

/**
 * Class Rate
 *
 * Rate data obtained from a Provider's RateResponse.
 *
 * @package Solarix\Shipping\Model\Rate
 */
class Rate implements RateInterface
{
  /** @var int */
  protected $baseCharge;
  /** @var string|null */
  protected $estimatedDeliveryAt;
  /** @var int */
  protected $fee;
  /** @var string|int|null */
  protected $id;
  /** @var int */
  protected $tax;
  /** @var int */
  protected $totalCharge;

  /**
   * @return int
   */
  public function getBaseCharge(): int
  {
    return $this->baseCharge;
  }

  /**
   * @param int $baseCharge
   *
   * @return RateInterface
   */
  public function setBaseCharge(int $baseCharge): RateInterface
  {
    $this->baseCharge = $baseCharge;
    return $this;
  }

  /**
   * @return int
   */
  public function getFee(): int
  {
    return $this->fee;
  }

  /**
   * @param int $fee
   *
   * @return RateInterface
   */
  public function setFee(int $fee): RateInterface
  {
    $this->fee = $fee;
    return $this;
  }

  /**
   * @return int|string|null
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int|string|null $id
   *
   * @return RateInterface
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getTax(): int
  {
    return $this->tax;
  }

  /**
   * @param int $tax
   *
   * @return RateInterface
   */
  public function setTax(int $tax): RateInterface
  {
    $this->tax = $tax;
    return $this;
  }

  /**
   * @return int
   */
  public function getTotalCharge(): int
  {
    return $this->totalCharge;
  }

  /**
   * @param int $totalCharge
   *
   * @return RateInterface
   */
  public function setTotalCharge(int $totalCharge): RateInterface
  {
    $this->totalCharge = $totalCharge;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getEstimatedDeliveryAt(): ?string
  {
    return $this->estimatedDeliveryAt;
  }

  /**
   * @param string|null $estimatedDeliveryAt
   *
   * @return RateInterface
   */
  public function setEstimatedDeliveryAt(
    ?string $estimatedDeliveryAt
  ): RateInterface {
    $this->estimatedDeliveryAt = $estimatedDeliveryAt;
    return $this;
  }
}
