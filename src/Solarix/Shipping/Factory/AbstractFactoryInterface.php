<?php

namespace Solarix\Shipping\Factory;

use Solarix\Shipping\Provider\ProviderInterface;
use Solarix\Shipping\Traits\HasProviderInterface;

interface AbstractFactoryInterface extends HasProviderInterface
{
  /**
   * AbstractFactory constructor.
   *
   * @param ProviderInterface|null $provider
   */
  public function __construct(?ProviderInterface $provider);
}
