<?php

namespace Solarix\Shipping\Provider;

use Solarix\Shipping\Factory\AddressFactory;
use Solarix\Shipping\Factory\AddressFactoryInterface;
use Solarix\Shipping\Factory\RateFactory;
use Solarix\Shipping\Factory\RateFactoryInterface;
use Solarix\Shipping\Factory\RateRequestFactory;
use Solarix\Shipping\Factory\RateRequestFactoryInterface;
use Solarix\Shipping\Factory\ShipmentFactory;
use Solarix\Shipping\Factory\ShipmentFactoryInterface;

class BaseProvider implements ProviderInterface
{
  public function getAddressFactory(): AddressFactoryInterface
  {
    return new AddressFactory($this);
  }

  public function getRateFactory(): RateFactoryInterface
  {
    return new RateFactory($this);
  }

  public function getRateRequestFactory(): RateRequestFactoryInterface
  {
    return new RateRequestFactory($this);
  }

  public function getShipmentFactory(): ShipmentFactoryInterface
  {
    return new ShipmentFactory($this);
  }
}
