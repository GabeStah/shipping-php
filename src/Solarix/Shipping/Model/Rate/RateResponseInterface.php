<?php

namespace Solarix\Shipping\Model\Rate;

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
}
