<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\Rate\RateResponseInterface;

trait HasRateResponseTrait
{
  /**
   * @var RateResponseInterface|null
   */
  private $rateResponse;

  /**
   * @return RateResponseInterface|null
   */
  public function getRateResponse(): ?RateResponseInterface
  {
    return $this->rateResponse;
  }

  /**
   * @param RateResponseInterface|null $rateResponse
   *
   * @return void
   */
  public function setRateResponse(?RateResponseInterface $rateResponse): void
  {
    $this->rateResponse = $rateResponse;
  }
}
