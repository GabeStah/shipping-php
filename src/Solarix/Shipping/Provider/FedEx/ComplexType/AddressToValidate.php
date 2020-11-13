<?php

namespace Solarix\Shipping\Provider\FedEx\ComplexType;

use FedEx\AddressValidationService\ComplexType\AddressToValidate as FedExAddress;

class AddressToValidate extends FedExAddress
{
  public function __construct(array $options = null)
  {
    parent::__construct($options);
  }
}
