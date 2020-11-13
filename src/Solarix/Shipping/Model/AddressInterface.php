<?php

namespace Solarix\Shipping\Model;

interface AddressInterface
{
  /**
   * @return string|null
   */
  public function getCompanyName(): ?string;

  /**
   * @param string|null $companyName
   *
   * @return AddressInterface
   */
  public function setCompanyName(?string $companyName): AddressInterface;

  /**
   * @return string|null
   */
  public function getCountryCode(): ?string;

  /**
   * @param string|null $countryCode
   *
   * @return AddressInterface
   */
  public function setCountryCode(?string $countryCode): AddressInterface;

  /**
   * @return string|null
   */
  public function getEmail(): ?string;

  /**
   * @param string|null $email
   *
   * @return AddressInterface
   */
  public function setEmail(?string $email): AddressInterface;

  /**
   * @return string|null
   */
  public function getFirstName(): ?string;

  /**
   * @param string|null $firstName
   *
   * @return AddressInterface
   */
  public function setFirstName(?string $firstName): AddressInterface;

  /**
   * @return string|null
   */
  public function getLastName(): ?string;

  /**
   * @param string|null $lastName
   *
   * @return AddressInterface
   */
  public function setLastName(?string $lastName): AddressInterface;

  /**
   * @return string|null
   */
  public function getPhone(): ?string;

  /**
   * @param string|null $phone
   *
   * @return AddressInterface
   */
  public function setPhone(?string $phone): AddressInterface;

  /**
   * @return string|null
   */
  public function getPostalCode(): ?string;

  /**
   * @param string|null $postalCode
   *
   * @return AddressInterface
   */
  public function setPostalCode(?string $postalCode): AddressInterface;

  /**
   * @return mixed
   */
  public function getReply();

  /**
   * @param mixed $reply
   *
   * @return AddressInterface
   */
  public function setReply($reply);

  /**
   * @return mixed
   */
  public function getRequest();

  /**
   * @param mixed $request
   *
   * @return AddressInterface
   */
  public function setRequest($request);

  /**
   * @return string|null
   */
  public function getStateOrProvinceCode(): ?string;

  /**
   * @param string|null $stateOrProvinceCode
   *
   * @return AddressInterface
   */
  public function setStateOrProvinceCode(
    ?string $stateOrProvinceCode
  ): AddressInterface;

  /**
   * @return string[]|null
   */
  public function getStreetLines(): ?array;

  /**
   * @param string[]|null $streetLines
   *
   * @return AddressInterface
   */
  public function setStreetLines(?array $streetLines): AddressInterface;
}
