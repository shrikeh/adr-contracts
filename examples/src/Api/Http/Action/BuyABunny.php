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

namespace Examples\Api\Http\Action;

use Examples\Api\Http\Action\BuyABunny\LivestockPurchasedResponder;
use Examples\Api\Http\Action\BuyABunny\PurchaseLivestockFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Shrikeh\AdrContracts\Action\HttpAction;
use Shrikeh\App\Command\CommandBus;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class BuyABunny implements HttpAction
{

    public function __construct(
        private PurchaseLivestockFactory $purchaseLivestockFactory,
        private CommandBus $commandBus,
        private LivestockPurchasedResponder $livestockPurchasedResponder,
    ) {}

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $purchaseLivestock = $this->purchaseLivestockFactory->build($request);
        $result = $this->commandBus->handle($purchaseLivestock);

        return $this->livestockPurchasedResponder->respond($result);
    }
}
