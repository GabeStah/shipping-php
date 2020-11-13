<?php

namespace Solarix\Shipping\Model;

use Solarix\Shipping\Traits\JsonableTrait;
use Solarix\Shipping\Traits\ObjectableTrait;

class Address implements AddressInterface
{
  use JsonableTrait;
  use ObjectableTrait;

  /** @var string|null */
  protected $city;
  /** @var string|null */
  protected $companyName;
  /** @var string|null */
  protected $countryCode;
  /** @var string|null */
  protected $email;
  /** @var string|null */
  protected $firstName;
  /** @var string|null */
  protected $lastName;
  /** @var string|null */
  protected $phone;
  /** @var string|null */
  protected $postalCode;
  protected $reply;
  protected $request;
  /** @var string|null */
  protected $stateOrProvinceCode;
  /** @var string[]|null */
  protected $streetLines;

  public function __construct($options = null)
  {
    if (is_object($options)) {
      $options = (array) $options;
    }

    $this->normalize($options);
  }

  /**
   * @return string|null
   */
  public function getCity(): ?string
  {
    return $this->city;
  }

  /**
   * @param string|null $city
   *
   * @return AddressInterface
   */
  public function setCity(?string $city): AddressInterface
  {
    $this->city = $city;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getCompanyName(): ?string
  {
    return $this->companyName;
  }

  /**
   * @param string|null $companyName
   *
   * @return AddressInterface
   */
  public function setCompanyName(?string $companyName): AddressInterface
  {
    $this->companyName = $companyName;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getCountryCode(): ?string
  {
    return $this->countryCode;
  }

  /**
   * @param string|null $countryCode
   *
   * @return AddressInterface
   */
  public function setCountryCode(?string $countryCode): AddressInterface
  {
    $this->countryCode = $countryCode;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getEmail(): ?string
  {
    return $this->email;
  }

  /**
   * @param string|null $email
   *
   * @return AddressInterface
   */
  public function setEmail(?string $email): AddressInterface
  {
    $this->email = $email;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  /**
   * @param string|null $firstName
   *
   * @return AddressInterface
   */
  public function setFirstName(?string $firstName): AddressInterface
  {
    $this->firstName = $firstName;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  /**
   * @param string|null $lastName
   *
   * @return AddressInterface
   */
  public function setLastName(?string $lastName): AddressInterface
  {
    $this->lastName = $lastName;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPhone(): ?string
  {
    return $this->phone;
  }

  /**
   * @param string|null $phone
   *
   * @return AddressInterface
   */
  public function setPhone(?string $phone): AddressInterface
  {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getPostalCode(): ?string
  {
    return $this->postalCode;
  }

  /**
   * @param string|null $postalCode
   *
   * @return AddressInterface
   */
  public function setPostalCode(?string $postalCode): AddressInterface
  {
    $this->postalCode = $postalCode;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getReply()
  {
    return $this->reply;
  }

  /**
   * @param mixed $reply
   *
   * @return AddressInterface
   */
  public function setReply($reply)
  {
    $this->reply = $reply;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getRequest()
  {
    return $this->request;
  }

  /**
   * @param mixed $request
   *
   * @return AddressInterface
   */
  public function setRequest($request)
  {
    $this->request = $request;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getStateOrProvinceCode(): ?string
  {
    return $this->stateOrProvinceCode;
  }

  /**
   * @param string|null $stateOrProvinceCode
   *
   * @return AddressInterface
   */
  public function setStateOrProvinceCode(
    ?string $stateOrProvinceCode
  ): AddressInterface {
    $this->stateOrProvinceCode = $stateOrProvinceCode;
    return $this;
  }

  /**
   * @return string[]|null
   */
  public function getStreetLines(): ?array
  {
    return $this->streetLines;
  }

  /**
   * @param string[]|null $streetLines
   *
   * @return AddressInterface
   */
  public function setStreetLines(?array $streetLines): AddressInterface
  {
    $this->streetLines = $streetLines;
    return $this;
  }

  /**
   * Determine if addresses are functionally identical.
   *
   * @param AddressInterface $a
   * @param AddressInterface $b
   *
   * @return bool
   */
  public static function areDifferent(AddressInterface $a, AddressInterface $b)
  {
    $keys = [
      'FirstName',
      'LastName',
      'StreetLines',
      'City',
      'StateOrProvinceCode',
      'PostalCode',
      'CountryCode',
    ];

    $aObject = $a->toObject();
    $bObject = $b->toObject();

    foreach ($keys as $key) {
      // Check for mismatched keys
      if (
        !empty($aObject->$key) &&
        property_exists($aObject, $key) &&
        !property_exists($bObject, $key)
      ) {
        return true;
      } elseif (
        !empty($bObject->$key) &&
        !property_exists($aObject, $key) &&
        property_exists($bObject, $key)
      ) {
        return true;
      }

      if (gettype($aObject->$key) !== gettype($bObject->$key)) {
        return true;
      }

      if (is_array($aObject->$key)) {
        foreach ($aObject->$key as $itemKey => $item) {
          if (!empty($item)) {
            // Key not found
            if (!array_key_exists($itemKey, $bObject->$key)) {
              return true;
            } elseif ($item !== $bObject->$key[$itemKey]) {
              return true;
            }
          }
        }

        foreach ($bObject->$key as $itemKey => $item) {
          if (!empty($item)) {
            // Key not found
            if (!array_key_exists($itemKey, $aObject->$key)) {
              return true;
            } elseif ($item !== $aObject->$key[$itemKey]) {
              return true;
            }
          }
        }
      } else {
        // Equality comparison
        if ($aObject->$key !== $bObject->$key) {
          return true;
        }
      }
    }

    return false;
  }

  /**
   * Perform required normalization on options data.
   *
   * For example, FedEx API rejects State/Province codes longer than 2 characters,
   * so normalization auto-shortens.
   *
   * @param null $options
   *
   * @return void |null
   */
  private function normalize(&$options = null): void
  {
  }
}
