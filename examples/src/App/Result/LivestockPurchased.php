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

namespace Examples\App\Result;

use Examples\PetStore\Receipt;
use Shrikeh\App\Message\Correlated;
use Shrikeh\App\Message\Correlation\Traits\WithCorrelation;
use Shrikeh\App\Message\Result;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class LivestockPurchased implements Result, Correlated
{
    use WithCorrelation;

    public function __construct(public Receipt $receipt)
    {

    }
}
