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

namespace Examples\PetStore;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class Basket
{
    public function checkout(string $livestockName, int $quantity): Receipt
    {
        return new Receipt();
    }
}
