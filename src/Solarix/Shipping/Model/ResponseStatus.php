<?php

namespace Solarix\Shipping\Model;

/**
 * Class ResponseStatus
 *
 * Response status based on Provider RateResponse.
 *
 * @package Solarix\Shipping\Model
 */
class ResponseStatus implements ResponseStatusInterface
{
  /** @var int|null */
  protected $code;
  /** @var bool|null */
  protected $isError;
  /** @var string */
  protected $message;

  /**
   * @return int|null
   */
  public function getCode(): ?int
  {
    return $this->code;
  }

  /**
   * @param int|null $code
   *
   * @return ResponseStatusInterface
   */
  public function setCode(?int $code): ResponseStatusInterface
  {
    $this->code = $code;
    return $this;
  }

  /**
   * @return bool|null
   */
  public function getIsError(): ?bool
  {
    return $this->isError;
  }

  /**
   * @param bool|null $isError
   *
   * @return ResponseStatusInterface
   */
  public function setIsError(?bool $isError): ResponseStatusInterface
  {
    $this->isError = $isError;
    return $this;
  }

  /**
   * @return string
   */
  public function getMessage(): string
  {
    return $this->message;
  }

  /**
   * @param string $message
   *
   * @return ResponseStatusInterface
   */
  public function setMessage(string $message): ResponseStatusInterface
  {
    $this->message = $message;
    return $this;
  }
}
