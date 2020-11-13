<?php

namespace Solarix\Shipping\Provider\FedEx\Model;

use Solarix\Shipping\Model\Address as BaseAddress;

/**
 * Class Address
 *
 * @package Solarix\Shipping\Provider\FedEx\Model
 */
class Address extends BaseAddress
{
  public function __construct($options = null)
  {
    parent::__construct($options);
  }

  public function getStateOrProvinceCode(): ?string
  {
    if (strlen(parent::getStateOrProvinceCode()) > 2) {
      return substr(parent::getStateOrProvinceCode(), 0, 2);
    }
    return parent::getStateOrProvinceCode();
  }
}
