<?php

namespace Solarix\Shipping\Traits;

trait JsonableTrait
{
  /**
   * Convert object to encoded JSON.
   *
   * @return false|string
   */
  public function toJson()
  {
    return json_encode($this->toObject());
  }
}
