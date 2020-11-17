<?php

namespace Solarix\Shipping\Provider;

use Solarix\Shipping\Factory\AddressFactoryInterface;
use Solarix\Shipping\Factory\RateFactoryInterface;
use Solarix\Shipping\Factory\RateRequestFactoryInterface;
use Solarix\Shipping\Factory\ShipmentFactoryInterface;
use Solarix\Shipping\Factory\ShippableFactoryInterface;
use Solarix\Shipping\Factory\ShippableUnitFactoryInterface;

interface ProviderInterface
{
  /**
   * @return AddressFactoryInterface
   */
  public function getAddressFactory(): AddressFactoryInterface;

  /**
   * @return RateFactoryInterface
   */
  public function getRateFactory(): RateFactoryInterface;

  /**
   * @return RateRequestFactoryInterface
   */
  public function getRateRequestFactory(): RateRequestFactoryInterface;

  /**
   * @return ShipmentFactoryInterface
   */
  public function getShipmentFactory(): ShipmentFactoryInterface;

  /**
   * @return ShippableFactoryInterface
   */
  public function getShippableFactory(): ShippableFactoryInterface;

  /**
   * @return ShippableUnitFactoryInterface
   */
  public function getShippableUnitFactory(): ShippableUnitFactoryInterface;
}
