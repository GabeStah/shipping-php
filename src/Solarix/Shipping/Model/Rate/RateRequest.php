<?php

namespace Solarix\Shipping\Model\Rate;

use Solarix\Shipping\Factory\RateFactoryInterface;
use Solarix\Shipping\Model\ShipmentInterface;
use Solarix\Shipping\Traits\HasRateFactoryTrait;
use Solarix\Shipping\Traits\HasRateResponseTrait;
use Solarix\Shipping\Traits\HasShipmentTrait;

class RateRequest implements RateRequestInterface
{
  use HasRateFactoryTrait, HasRateResponseTrait, HasShipmentTrait;

  public function __construct(
    ShipmentInterface $shipment,
    RateFactoryInterface $rateFactory,
    ?array $options = null
  ) {
    $this->setShipment($shipment);
    $this->setRateFactory($rateFactory);
  }

  /**
   * Determine if RateRequest is valid.
   *
   * @return bool
   */
  public function isValid(): bool
  {
    return $this->getShipment()->countShippableUnits() >= 0;
  }

  /**
   * Make a rate service request to FedEx API.
   *
   * @return RateResponseInterface|null
   */
  public function makeRequest(): ?RateResponseInterface
  {
    if (!$this->isValid()) {
      return null;
    }

    return new RateResponse();
  }
}
