<?php

namespace Solarix\Shipping\Model\Rate;

/**
 * Class RateResponse
 *
 * Response obtained from Provider RateRequest.
 *
 * @package Solarix\Shipping\Model\Rate
 */
class RateResponse implements RateResponseInterface
{
  /** @var string|int|null */
  protected $id;
  /** @var RateInterface[]|null */
  protected $rates;

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
   * @return RateResponseInterface
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @param RateInterface $rate
   *
   * @return RateResponseInterface
   */
  public function addRate(RateInterface $rate): RateResponseInterface
  {
    $this->rates[] = $rate;
    return $this;
  }

  /**
   * @return RateInterface[]|null
   */
  public function getRates(): ?array
  {
    return $this->rates;
  }

  /**
   * @param RateInterface[]|null $rates
   *
   * @return RateResponseInterface
   */
  public function setRates(?array $rates): RateResponseInterface
  {
    $this->rates = $rates;
    return $this;
  }
}
