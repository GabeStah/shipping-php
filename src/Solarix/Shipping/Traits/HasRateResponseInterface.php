<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Model\Rate\RateResponseInterface;

interface HasRateResponseInterface
{
  /**
   * @return RateResponseInterface|null
   */
  public function getRateResponse(): ?RateResponseInterface;

  /**
   * @param RateResponseInterface|null $rateResponse
   *
   * @return void
   */
  public function setRateResponse(?RateResponseInterface $rateResponse): void;
}
