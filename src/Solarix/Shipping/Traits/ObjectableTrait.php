<?php

namespace Solarix\Shipping\Traits;

trait ObjectableTrait
{
  /**
   * Convert to transferable object.
   *
   * @return object
   */
  public function toObject()
  {
    return (object) ($this->values ? $this->values : $this);
  }
}
