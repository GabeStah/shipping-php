<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Provider\ProviderInterface;
use Solarix\Shipping\Traits\HasProviderTrait;

abstract class AbstractFactory implements AbstractFactoryInterface
{
  use HasProviderTrait;

  /**
   * AbstractFactory constructor.
   *
   * @param ProviderInterface|null $provider
   */
  public function __construct(?ProviderInterface $provider)
  {
    $this->setProvider($provider);
  }
}
