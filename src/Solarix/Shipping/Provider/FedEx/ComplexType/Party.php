<?php

namespace Solarix\Shipping\Provider\FedEx\ComplexType;

use FedEx\RateService\ComplexType\Party as FedExParty;

class Party extends FedExParty
{
  public function __construct(array $options = null)
  {
    parent::__construct($options);
  }
}
