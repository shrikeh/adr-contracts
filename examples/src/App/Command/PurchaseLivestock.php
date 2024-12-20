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

namespace Examples\App\Command;

use Shrikeh\App\Message\Command;
use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Correlation\Traits\WithCorrelation;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class PurchaseLivestock implements Command, Correlated
{
    use WithCorrelation;

    public function __construct(public string $liveStockName, public int $quantity)
    {

    }
}
