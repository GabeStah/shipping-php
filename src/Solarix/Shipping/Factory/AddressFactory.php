<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Model\Address;
use Solarix\Shipping\Model\AddressInterface;
use Solarix\Shipping\Provider\BaseProvider;
use Solarix\Shipping\Provider\FedExProvider;

/**
 * Class AddressFactory
 *
 * Create Address instances
 *
 * @package Solarix\Shipping\Factory
 */
class AddressFactory extends AbstractFactory implements AddressFactoryInterface
{
  public const DESTINATION_TYPE = 'DESTINATION';
  public const ORIGIN_TYPE = 'ORIGIN';

  /**
   * @return AddressInterface
   */
  public function create(): AddressInterface
  {
    switch ($this->getProvider()) {
      case $this->getProvider() instanceof FedExProvider:
        return new \Solarix\Shipping\Provider\FedEx\Model\Address();
      case $this->getProvider() instanceof BaseProvider:
      default:
        return new Address();
    }
  }

  /**
   * @param string $type
   *
   * @return AddressInterface
   */
  public function default(string $type = self::ORIGIN_TYPE): AddressInterface
  {
    return $this->create()
      ->setCity($_ENV['SOLARIX_SHIPPING_DEFAULT_' . $type . '_ADDRESS_CITY'])
      ->setCountryCode(
        $_ENV['SOLARIX_SHIPPING_DEFAULT_' . $type . '_ADDRESS_COUNTRY']
      )
      ->setPostalCode(
        $_ENV['SOLARIX_SHIPPING_DEFAULT_' . $type . '_ADDRESS_POSTAL_CODE']
      )
      ->setStateOrProvinceCode(
        $_ENV['SOLARIX_SHIPPING_DEFAULT_' . $type . '_ADDRESS_STATE']
      )
      ->setStreetLines([
        $_ENV['SOLARIX_SHIPPING_DEFAULT_' . $type . '_ADDRESS_STREET'],
      ]);
  }
}
