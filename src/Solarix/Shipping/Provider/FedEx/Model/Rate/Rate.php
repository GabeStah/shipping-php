<?php

namespace Solarix\Shipping\Provider\FedEx\Model\Rate;

use Solarix\Shipping\Model\Rate\Rate as BaseRate;
use Solarix\Shipping\Model\Rate\RateInterface;

/**
 * Class Rate
 *
 * Rate data obtained from a Provider's RateResponse.
 *
 * @package Solarix\Shipping\Provider\FedEx\Model\Rate
 */
class Rate extends BaseRate
{
  /**
   * @param int|string|null $id
   *
   * @return RateInterface
   */
  public function setId($id)
  {
    $index = strpos($id, 'FEDEX');
    if ($index === false || $index > 0) {
      // Add prefix
      $id = 'FEDEX_' . $id;
    }
    return parent::setId($id);
  }
}
