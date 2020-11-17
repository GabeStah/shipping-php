<?php

namespace Solarix\Shipping\Model\Rate;

use Solarix\Shipping\Model\ResponseStatus;
use Solarix\Shipping\Model\ResponseStatusInterface;

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
  /** @var ResponseStatus[]|null */
  protected $statuses;

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

  /**
   * @param ResponseStatus $responseStatus
   *
   * @return $this|RateResponseInterface
   */
  public function addStatus(
    ResponseStatus $responseStatus
  ): RateResponseInterface {
    $this->statuses[] = $responseStatus;
    return $this;
  }

  /**
   * @return ResponseStatus[]|null
   */
  public function getStatuses(): ?array
  {
    return $this->statuses;
  }

  /**
   * @param ResponseStatus[]|null $statuses
   *
   * @return RateResponseInterface
   */
  public function setStatuses(?array $statuses): RateResponseInterface
  {
    $this->statuses = $statuses;
    return $this;
  }

  /**
   * Determine if response experienced an error.
   *
   * @return ResponseStatusInterface|bool
   */
  public function hasError()
  {
    if (!$this->getStatuses()) {
      return false;
    }
    foreach ($this->getStatuses() as $responseStatus) {
      if ($responseStatus->getIsError()) {
        return $responseStatus;
      }
    }
    return false;
  }
}
