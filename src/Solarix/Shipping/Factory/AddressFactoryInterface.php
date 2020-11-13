<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\AddressInterface;

interface AddressFactoryInterface extends AbstractFactoryInterface
{
  public function create(): AddressInterface;

  public function default(
    string $type = AddressFactory::ORIGIN_TYPE
  ): AddressInterface;
}
