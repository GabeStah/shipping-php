<?php

namespace Solarix\Shipping\Provider\FedEx\ComplexType;

use FedEx\RateService\ComplexType\RequestedShipment as FedExRequestedShipment;
use FedEx\RateService\SimpleType;

class RequestedShipment extends FedExRequestedShipment
{
  public function __construct(array $options = null)
  {
    parent::__construct($options);
    $this->setDropoffType(SimpleType\DropoffType::_REGULAR_PICKUP);
    $this->setShipTimestamp(date('c'));
  }
}
