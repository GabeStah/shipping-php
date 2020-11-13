<?php

namespace Solarix\Shipping\Model\Rate;

use Solarix\Shipping\Factory\RateFactoryInterface;
use Solarix\Shipping\Model\ShipmentInterface;
use Solarix\Shipping\Traits\HasRateFactoryInterface;
use Solarix\Shipping\Traits\HasRateResponseInterface;
use Solarix\Shipping\Traits\HasShipmentInterface;

interface RateRequestInterface extends
  HasRateFactoryInterface,
  HasRateResponseInterface,
  HasShipmentInterface
{
  /**
   * RateRequestInterface constructor.
   *
   * @param ShipmentInterface    $shipment
   * @param RateFactoryInterface $rateFactory
   * @param array|null           $options
   */
  public function __construct(
    ShipmentInterface $shipment,
    RateFactoryInterface $rateFactory,
    ?array $options
  );

  /**
   * @return RateFactoryInterface|null
   */
  public function getRateFactory(): ?RateFactoryInterface;

  /**
   * Determine if RateRequest is valid.
   *
   * @return bool
   */
  public function isValid(): bool;

  /**
   * Make a rate service request.
   *
   * @return RateResponseInterface|null
   */
  public function makeRequest(): ?RateResponseInterface;

  //  /**
  //   * @param RateResponseInterface $reply
  //   *
  //   * @return RateInterface[]|null
  //   */
  //  public function updateRates(RateResponseInterface $reply);
}
