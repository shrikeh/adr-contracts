# Action Domain Responder Contracts

This package provides interfaces for [*Action Domain Responder*][adr] (ADR) applications. In this instance, the *Action* can be either an HTTP Action (using the [PSR-7 Http Message interface][psr7]) or a Console Action (which uses the [Symfony Console component][console]).

## Action

Actions are expected to be:

- A single activity exposed by the application. Unlike HTTP controllers which frequently have many public methods for different RESTful verbs, an Action only ever does one thing. This helps with CQRS, testing, etc.
- A name that is friendly (or, at least, sympathetic to) the language of the user, which can be separate from the language of the domain.

So, a pet store API may have a `BuyABunny` HTTP action, but it interacts with the domain logic describing _purchasing livestock_ or similarly cold hard truths.

## Domain

If ued with the `shrikeh/common-app` package, the Domain is _not_ directly interacted with, but rather a `Message` is passed to a Command or Query bus, and a `Result` returned.

Returning to our pet store, this might mean that a `PurchaseLivestock` Command is created (complete with details of said bunny), and a Result of `LivestockPurchased` returned from the bus.

## Responder

Following on from above, the role of a _Responder_ is to translate the `Result` returned from the bus into the corresponding expected output. For example, the `HttpResponder` interface takes a Result and returns a PSR-7 `ResponseInterface`. Under the hood, the Responder could use a templating system such as Twig, or a Hypermedia API.

## Example

Here is our `BuyABunny` Action:



[adr]: https://github.com/pmjones/adr
[psr7]: https://www.php-fig.org/psr/psr-7/
[console]: https://symfony.com/doc/current/components/console.html
