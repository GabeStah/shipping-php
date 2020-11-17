<?php

namespace Solarix\Shipping\Model;

/**
 * Class ResponseStatusInterface
 *
 * Response status based on Provider RateResponse.
 *
 * @package Solarix\Shipping\Model
 */
interface ResponseStatusInterface
{
  /**
   * @return int|null
   */
  public function getCode(): ?int;

  /**
   * @param int|null $code
   *
   * @return ResponseStatusInterface
   */
  public function setCode(?int $code): ResponseStatusInterface;

  /**
   * @return bool|null
   */
  public function getIsError(): ?bool;

  /**
   * @param bool|null $isError
   *
   * @return ResponseStatusInterface
   */
  public function setIsError(?bool $isError): ResponseStatusInterface;

  /**
   * @return string
   */
  public function getMessage(): string;

  /**
   * @param string $message
   *
   * @return ResponseStatusInterface
   */
  public function setMessage(string $message): ResponseStatusInterface;
}
