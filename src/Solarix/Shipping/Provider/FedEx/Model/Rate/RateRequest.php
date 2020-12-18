<?php

namespace Solarix\Shipping\Provider\FedEx\Model\Rate;

use FedEx\RateService\ComplexType;
use FedEx\RateService\ComplexType\Address as FedExAddress;
use FedEx\RateService\ComplexType\RateReply;
use FedEx\RateService\ComplexType\RateRequest as FedExRequest;
use FedEx\RateService\Request;
use FedEx\RateService\SimpleType;
use Solarix\Shipping\Factory\RateFactoryInterface;
use Solarix\Shipping\Model\AddressInterface;
use Solarix\Shipping\Model\Rate\RateRequest as BaseRateRequest;
use Solarix\Shipping\Model\Rate\RateRequestInterface;
use Solarix\Shipping\Model\Rate\RateResponse;
use Solarix\Shipping\Model\Rate\RateResponseInterface;
use Solarix\Shipping\Model\ResponseStatus;
use Solarix\Shipping\Model\ShipmentInterface;
use Solarix\Shipping\Model\ShippableInterface;
use Solarix\Shipping\Provider\FedEx\ComplexType\Party;
use Solarix\Shipping\Provider\FedEx\ComplexType\RequestedShipment;

class RateRequest extends BaseRateRequest
{
  protected $fedexRequest;

  public function __construct(
    ShipmentInterface $shipment,
    RateFactoryInterface $rateFactory,
    ?array $options = null
  ) {
    parent::__construct($shipment, $rateFactory, $options);
    $this->setRateResponse(new RateResponse());
  }

  /**
   * Get Address as FedEx lib address
   *
   * @param AddressInterface $address
   *
   * @return FedExAddress
   */
  protected static function addressToFedExAddress(
    AddressInterface $address
  ): FedExAddress {
    return (new FedExAddress())
      ->setPostalCode($address->getPostalCode())
      ->setCity($address->getCity())
      ->setStreetLines($address->getStreetLines())
      ->setStateOrProvinceCode($address->getStateOrProvinceCode())
      ->setCountryCode($address->getCountryCode());
  }

  /**
   * Create a rate request object using class properties and default values.
   *
   * @param ShipmentInterface $shipment
   *
   * @return FedExRequest
   */
  private function createFedExRequest(ShipmentInterface $shipment): FedExRequest
  {
    $fedexRequest = new FedExRequest([
      'RequestedShipment' => new RequestedShipment([
        'PackageCount' => $shipment->countShippables(),
        // New version no longer accepts 'ACCOUNT' type
        'RateRequestTypes' => ['LIST'],
        'RequestedPackageLineItems' => self::getLineItems($shipment),
        'Recipient' => new Party([
          'Address' => self::addressToFedExAddress($shipment->getDestination()),
        ]),
        'Shipper' => new Party([
          'Address' => self::addressToFedExAddress($shipment->getOrigin()),
        ]),
      ]),
    ]);

    $userCredential = new ComplexType\WebAuthenticationCredential();
    $userCredential
      ->setKey($_ENV['FEDEX_KEY'])
      ->setPassword($_ENV['FEDEX_PASSWORD']);

    $webAuthenticationDetail = new ComplexType\WebAuthenticationDetail();
    $webAuthenticationDetail->setUserCredential($userCredential);

    $fedexRequest->setWebAuthenticationDetail($webAuthenticationDetail);

    $clientDetail = new ComplexType\ClientDetail();
    $clientDetail
      ->setAccountNumber($_ENV['FEDEX_ACCOUNT_NUMBER'])
      ->setMeterNumber($_ENV['FEDEX_METER_NUMBER']);

    $fedexRequest->setClientDetail($clientDetail);

    $transactionDetail = new ComplexType\TransactionDetail();
    $transactionDetail->setCustomerTransactionId(
      'Testing Rate Service request'
    );

    $fedexRequest->setTransactionDetail($transactionDetail);

    $versionId = new ComplexType\VersionId();
    $versionId
      ->setServiceId('crs')
      ->setMajor(24)
      ->setIntermediate(0)
      ->setMinor(0);

    $fedexRequest->setVersion($versionId);
    $fedexRequest->setReturnTransitAndCommit(true);

    return $fedexRequest;
  }

  /**
   * Create a cart line item object compatible with FedEx API.
   * Must contain dimensions, weight, and package count.
   *
   * @param ShippableInterface $shippable
   *
   * @return ComplexType\RequestedPackageLineItem|null
   */
  public static function createLineItem(ShippableInterface $shippable)
  {
    // Set dimensions
    $dimensions = new ComplexType\Dimensions();
    $dimensions
      ->setLength($shippable->getDepth())
      ->setWidth($shippable->getWidth())
      ->setHeight($shippable->getHeight())
      ->setUnits(SimpleType\LinearUnits::_IN);

    // Set weight
    $weight = new ComplexType\Weight();
    $weight
      ->setUnits(SimpleType\WeightUnits::_LB)
      ->setValue($shippable->getWidth());

    $lineItem = new ComplexType\RequestedPackageLineItem();
    $lineItem->setWeight($weight)->setDimensions($dimensions);

    // Multiple for quantity
    $lineItem->setGroupPackageCount($shippable->getQuantity());

    return $lineItem;
  }

  /**
   * Get the line items collection from Shipment
   *
   * @param ShipmentInterface $shipment
   *
   * @return array|null
   */
  public static function getLineItems(ShipmentInterface $shipment)
  {
    if (count($shipment->getShippableUnits()) === 0) {
      return null;
    }

    $lineItems = [];

    foreach ($shipment->getShippableUnits() as $shippableUnit) {
      foreach ($shippableUnit->getShippables() as $shippable) {
        // Add to array
        $lineItems[] = static::createLineItem($shippable);
      }
    }

    return $lineItems;
  }

  /**
   * @return FedExRequest
   */
  public function getFedexRequest(): FedExRequest
  {
    return $this->fedexRequest;
  }

  /**
   * Determine if RateRequest is valid.
   *
   * @return bool
   */
  public function isValid(): bool
  {
    if ($this->getShipment()->countShippableUnits() == 0) {
      return false;
    }
    if (!$this->getFedexRequest()) {
      return false;
    }
    return true;
  }

  /**
   * Make a rate service request to FedEx API.
   *
   * @return RateResponseInterface|null
   */
  public function makeRequest(): ?RateResponseInterface
  {
    $this->setFedexRequest($this->createFedExRequest($this->getShipment()));
    if (!$this->isValid()) {
      return null;
    }

    $rateServiceRequest = new Request();
    $rateServiceRequest->getSoapClient()->__setLocation($_ENV['FEDEX_URL']);
    $rateReply = $rateServiceRequest->getGetRatesReply(
      $this->getFedexRequest()
    );
    $this->updateRates($rateReply);
    return $this->getRateResponse();
  }

  /**
   * Update current Rate collection based on API reply.
   *
   * @param RateReply $reply
   *
   * @return RateRequest|null
   */
  public function updateRates(RateReply $reply)
  {
    // Short circuit if not successful
    if (in_array($reply->HighestSeverity, ['ERROR', 'FAILURE'])) {
      foreach ($reply->Notifications as $notification) {
        if (in_array($notification->Severity, ['ERROR', 'FAILURE'])) {
          $this->getRateResponse()->addStatus(
            (new ResponseStatus())
              ->setIsError(true)
              ->setMessage(
                $notification->LocalizedMessage ?? $notification->Message
              )
              ->setCode($notification->Code)
          );
        }
      }

      return null;
    }

    foreach ($reply->RateReplyDetails as $rateReplyDetail) {
      foreach ($rateReplyDetail->RatedShipmentDetails as $ratedShipmentDetail) {
        if (
          $ratedShipmentDetail->ShipmentRateDetail->RateType ===
            'PAYOR_LIST_PACKAGE' ||
          $ratedShipmentDetail->ShipmentRateDetail->RateType ===
            'PAYOR_LIST_SHIPMENT'
        ) {
          $rate = $this->getRateFactory()->create();
          $rate->setId($rateReplyDetail->ServiceType);
          $rate->setEstimatedDeliveryAt($rateReplyDetail->DeliveryTimestamp);
          $rate->setBaseCharge(
            $ratedShipmentDetail->ShipmentRateDetail->TotalBaseCharge->Amount
          );
          $this->getRateResponse()->addRate($rate);
        }
      }
    }
    return $this;
  }

  /**
   * @param FedExRequest $fedexRequest
   *
   * @return RateRequestInterface
   */
  public function setFedexRequest(
    FedExRequest $fedexRequest
  ): RateRequestInterface {
    $this->fedexRequest = $fedexRequest;
    return $this;
  }
}
