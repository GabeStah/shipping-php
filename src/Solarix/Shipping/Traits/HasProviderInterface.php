<?php

namespace Solarix\Shipping\Traits;

use Solarix\Shipping\Provider\ProviderInterface;

interface HasProviderInterface
{
  /**
   * Get provider.
   *
   * @return ProviderInterface|null
   */
  public function getProvider(): ?ProviderInterface;

  /**
   * Set provider
   *
   * @param ProviderInterface|null $provider
   */
  public function setProvider(?ProviderInterface $provider);
}
