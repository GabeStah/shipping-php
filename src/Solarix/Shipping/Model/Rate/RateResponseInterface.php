<?php

namespace Solarix\Shipping\Model\Rate;

use Solarix\Shipping\Model\ResponseStatus;
use Solarix\Shipping\Model\ResponseStatusInterface;

/**
 * Interface RateResponseInterface
 *
 * Response obtained from Provider RateRequest.
 *
 * @package Solarix\Shipping\Model\Rate
 */
interface RateResponseInterface
{
  /**
   * @return int|string|null
   */
  public function getId();

  /**
   * @param int|string|null $id
   *
   * @return RateResponseInterface
   */
  public function setId($id);

  /**
   * @param RateInterface $rate
   *
   * @return RateResponseInterface
   */
  public function addRate(RateInterface $rate): RateResponseInterface;

  /**
   * @return RateInterface[]|null
   */
  public function getRates(): ?array;

  /**
   * @param RateInterface[]|null $rates
   *
   * @return RateResponseInterface
   */
  public function setRates(?array $rates): RateResponseInterface;

  /**
   * @param ResponseStatus $responseStatus
   *
   * @return $this|RateResponseInterface
   */
  public function addStatus(
    ResponseStatus $responseStatus
  ): RateResponseInterface;

  /**
   * @return ResponseStatus[]|null
   */
  public function getStatuses(): ?array;

  /**
   * @param ResponseStatus[]|null $statuses
   *
   * @return RateResponseInterface
   */
  public function setStatuses(?array $statuses): RateResponseInterface;

  /**
   * Determine if response experienced an error.
   *
   * @return ResponseStatusInterface|bool
   */
  public function hasError();
}
