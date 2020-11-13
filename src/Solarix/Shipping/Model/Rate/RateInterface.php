<?php

namespace Solarix\Shipping\Model\Rate;

/**
 * Interface RateInterface
 *
 * Rate data obtained from a Provider's RateResponse.
 *
 * @package Solarix\Shipping\Model\Rate
 */
interface RateInterface
{
  /**
   * @return int
   */
  public function getBaseCharge(): int;

  /**
   * @param int $baseCharge
   *
   * @return RateInterface
   */
  public function setBaseCharge(int $baseCharge): RateInterface;

  /**
   * @return int
   */
  public function getFee(): int;

  /**
   * @param int $fee
   *
   * @return RateInterface
   */
  public function setFee(int $fee): RateInterface;

  /**
   * @return int|string|null
   */
  public function getId();

  /**
   * @param int|string|null $id
   *
   * @return RateInterface
   */
  public function setId($id);

  /**
   * @return int
   */
  public function getTax(): int;

  /**
   * @param int $tax
   *
   * @return RateInterface
   */
  public function setTax(int $tax): RateInterface;

  /**
   * @return int
   */
  public function getTotalCharge(): int;

  /**
   * @param int $totalCharge
   *
   * @return RateInterface
   */
  public function setTotalCharge(int $totalCharge): RateInterface;
}
