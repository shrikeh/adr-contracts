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

namespace Examples\App\Command\Handler;

use Examples\App\Command\PurchaseLivestock;
use Examples\App\Result\LivestockPurchased;
use Examples\PetStore\Basket;
use Shrikeh\App\Command\CommandHandler;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class LivestockPurchase implements CommandHandler
{
    public function __construct(private Basket $basket)
    {

    }

    public function __invoke(PurchaseLivestock $purchaseLivestock): LivestockPurchased
    {
        $receipt = $this->basket->checkout(
            $purchaseLivestock->liveStockName,
            $purchaseLivestock->quantity,
        );

        return new LivestockPurchased($receipt);
    }
}
