<?php

namespace Solarix\Shipping\Provider\FedEx\ComplexType;

use FedEx\AddressValidationService\ComplexType\AddressValidationRequest as FedExRequest;
use FedEx\AddressValidationService\ComplexType;

class AddressValidationRequest extends FedExRequest
{
  public function __construct(array $options = null)
  {
    parent::__construct($options);

    $this->WebAuthenticationDetail->UserCredential->Key = $_ENV['FEDEX_KEY'];
    $this->WebAuthenticationDetail->UserCredential->Password =
      $_ENV['FEDEX_PASSWORD'];

    $this->ClientDetail->AccountNumber = $_ENV['FEDEX_ACCOUNT_NUMBER'];
    $this->ClientDetail->MeterNumber = $_ENV['FEDEX_METER_NUMBER'];

    $this->Version->ServiceId = 'aval';
    $this->Version->Major = 4;
    $this->Version->Intermediate = 0;
    $this->Version->Minor = 0;

    $versionId = new ComplexType\VersionId();
    $versionId
      ->setServiceId('aval')
      ->setMajor(4)
      ->setIntermediate(0)
      ->setMinor(0);

    $this->setVersion($versionId);
  }
}
