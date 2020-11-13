<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Factory\RateFactoryInterface;

trait HasRateFactoryTrait
{
  /**
   * @var RateFactoryInterface|null
   */
  private $rateFactory;

  /**
   * @return RateFactoryInterface|null
   */
  public function getRateFactory(): ?RateFactoryInterface
  {
    return $this->rateFactory;
  }

  /**
   * @param RateFactoryInterface|null $rateFactory
   *
   * @return void
   */
  public function setRateFactory(?RateFactoryInterface $rateFactory): void
  {
    $this->rateFactory = $rateFactory;
  }
}
