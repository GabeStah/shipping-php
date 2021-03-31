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

  /**
   * Get state or province code.
   *
   * Concatenates to last 2 characters to meet FedEx API requirements.
   *
   * @return string|null
   */
  public function getStateOrProvinceCode(): ?string
  {
    if (strlen(parent::getStateOrProvinceCode()) > 2) {
      return substr(
        parent::getStateOrProvinceCode(),
        strlen(parent::getStateOrProvinceCode()) - 2
      );
    }
    return parent::getStateOrProvinceCode();
  }
}
