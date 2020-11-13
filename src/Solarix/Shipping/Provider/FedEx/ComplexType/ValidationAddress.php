<?php

namespace Solarix\Shipping\Provider\FedEx\ComplexType;

use FedEx\AddressValidationService\ComplexType\Address as FedExAddress;
use FedEx\AddressValidationService\ComplexType\AddressValidationReply;
use FedEx\AddressValidationService\Request;
use Solarix\Shipping\Model\RequestableInterface;

class ValidationAddress extends FedExAddress implements RequestableInterface
{
  public $reply;
  public $request;

  public function __construct(array $options = null)
  {
    if ($options instanceof $this) {
      return $options;
    }
    if (is_object($options)) {
      $options = (array) $options;
    }

    parent::__construct($options);
  }

  /**
   * Create an address validation request object using class properties and default values.
   */
  public function createRequest()
  {
    $this->request = new AddressValidationRequest([
      'AddressesToValidate' => [new AddressToValidate(['Address' => $this])],
    ]);

    return $this->request;
  }

  /**
   * Get address validation data.
   *
   * Ideal for external reference and expected vs actual.
   *
   * @param AddressValidationReply $response
   *
   * @param null                   $extraData
   *
   * @return array
   */
  public function getData(
    AddressValidationReply $response = null,
    $extraData = null
  ) {
    $output = [];
    $response = $response ? $response : $this->reply;
    foreach ($response->AddressResults as $result) {
      $attributes = [];
      foreach ($result->Attributes as $attribute) {
        $attributes[$attribute->Name] = $attribute->Value;
      }
      $output[] = array_merge(
        [
          'attributes' => $attributes,
          'classification' => $result->Classification,
          'effectiveAddress' => $result->EffectiveAddress->toArray(),
          'originalAddress' => $this->toArray(),
          'state' => $result->State,
        ],
        $extraData ?? []
      );
    }
    return $output;
  }

  /**
   * Make a rate service request to FedEx API.
   *
   * @return AddressValidationReply
   */
  public function makeRequest()
  {
    if (!$this->request) {
      // Create request if not initialized
      $this->createRequest();
    }

    $request = new Request();
    $request->getSoapClient()->__setLocation($_ENV['FEDEX_URL']);
    $this->reply = $request->getAddressValidationReply($this->request);
    return $this->reply;
  }

  /**
   * Execute validation
   *
   * @return AddressValidationReply
   */
  public function validate()
  {
    return $this->makeRequest();
  }

  /**
   * Determine if reply was successful with no warnings or errors.
   *
   * @param AddressValidationReply|null $response
   *
   * @return bool
   */
  public function wasReplySuccessful(AddressValidationReply $response = null)
  {
    $response = $response ? $response : $this->reply;
    return !in_array($response->HighestSeverity, [
      'ERROR',
      'FAILURE',
      'WARNING',
    ]);
  }
}
