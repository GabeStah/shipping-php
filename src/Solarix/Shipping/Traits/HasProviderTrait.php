<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Provider\BaseProvider;
use Solarix\Shipping\Provider\FedExProvider;
use Solarix\Shipping\Provider\ProviderInterface;

trait HasProviderTrait
{
  /** @var ProviderInterface */
  private $provider;

  /**
   * Get provider
   *
   * @return ProviderInterface|null
   */
  public function getProvider(): ?ProviderInterface
  {
    return $this->provider;
  }

  /**
   * Set provider
   *
   * @param ProviderInterface|null $provider
   */
  public function setProvider(?ProviderInterface $provider)
  {
    if ($provider) {
      $this->provider = $provider;
    } else {
      switch (strtolower($_ENV['SOLARIX_SHIPPING_PROVIDER'])) {
        case 'fedex':
          $this->provider = new FedExProvider();
          break;
        case 'base':
        default:
          $this->provider = new BaseProvider();
          break;
      }
    }
  }
}
