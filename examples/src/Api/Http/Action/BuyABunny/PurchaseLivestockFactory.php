<?php

/*
 * This file is part of Barney's Symfony skeleton for Domain-Driven Design
 *
 * (c) Barney Hanlon <symfony@shrikeh.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Examples\Api\Http\Action\BuyABunny;

use Examples\Api\Http\Action\BuyABunny\PurchaseLivestockFactory\Exception\InvalidRequestForPurchasingLivestock;
use Examples\Api\Http\Action\BuyABunny\PurchaseLivestockFactory\PurchaseLiveStockValidator;
use Examples\App\Command\PurchaseLivestock;
use Psr\Http\Message\ServerRequestInterface;
use Shrikeh\AdrContracts\MessageFactory\Http\HttpCommandFactory;
use Shrikeh\SymfonyApp\Correlation\CorrelationFactory;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class PurchaseLivestockFactory implements HttpCommandFactory
{
    public function __construct(
        private PurchaseLiveStockValidator $validator,
        private CorrelationFactory $correlationFactory
    ) {

    }

    /**
     * In this example, we validate the request to ensure it can be used to build a PurchaseLivestock command.
     * (In the example code, the validator always returns true). We then use a CorrelationFactory to add a
     * Correlation ID to the Command before returning it.
     *
     * @param ServerRequestInterface $request
     * @return PurchaseLivestock
     */
    public function build(ServerRequestInterface $request): PurchaseLivestock
    {
        if (!$this->validator->isValid($request)) {
            throw new InvalidRequestForPurchasingLivestock($request);
        }

        return (new PurchaseLivestock(
            $request->getAttribute('name'),
            (int) $request->getAttribute('quantity'),
        ))->withCorrelation($this->correlationFactory->correlation());
    }
}
