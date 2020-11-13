# Solarix Shipping (PHP)

The Solarix Shipping (PHP) package handles basic shipping tasks with a provider-based plugin system.

## Features

- Shippable units (groups of items)
- Shippable items
- Rate requests/responses
- Origin/destination address handling
- Provider-specific overrides and extensibility (i.e. FedEx, UPS, DHL, etc)

## Architecture

Solarix Shipping makes heavy use of strategy, factory, builder, and chain of responsibility design principles.

A provider is selected via code or environment variable which determines provider-specific logic, classes, and overrides to be invoked during execution.  Strict interface adherence encourages strategy patterns, allowing the provider to override a given class/method/behavior without the client's knowledge.

## Usage

The basic flow of usage is as follows:

1. Instantiate a [provider](src/Solarix/Shipping/Provider) such as `FedExProvider`.
2. Create object instances via [factories](src/Solarix/Shipping/Factory) obtained through the provider's `getXXXFactory` methods.
3. Create a base [Shipment](src/Solarix/Shipping/Model/Shipment) instance
4. Add one or more [ShippableUnits](src/Solarix/Shipping/Model/ShippableUnit) to the `Shipment`.  A `ShippableUnit` is a collection of one or more [Shippables](src/Solarix/Shipping/Model/Shippable), each of which represent a shippable entity (package, item, etc).
5. Set appropriate values of `Shippable` such as dimensions, weight, quantity, etc.
6. Create and assign origin and destination [Addresses](src/Solarix/Shipping/Model/Address) to the `Shipment`.
7. Create a [RateRequest](src/Solarix/Shipping/Model/RateRequest) and pass the `Shipment` instance.
8. Execute the `RateRequest` to get back a [RateResponse](src/Solarix/Shipping/Model/RateResponse), which contains one or more [Rate](src/Solarix/Shipping/Model/Rate) instances containing details about the rate data from the provider's API response.