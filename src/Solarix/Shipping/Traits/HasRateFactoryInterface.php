<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Factory\RateFactoryInterface;

interface HasRateFactoryInterface
{
  /**
   * @return RateFactoryInterface|null
   */
  public function getRateFactory(): ?RateFactoryInterface;

  /**
   * @param RateFactoryInterface|null $rateFactory
   *
   * @return void
   */
  public function setRateFactory(?RateFactoryInterface $rateFactory): void;
}
