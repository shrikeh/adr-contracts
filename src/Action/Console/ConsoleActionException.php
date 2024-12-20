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

namespace Shrikeh\AdrContracts\Action\Console;

use Shrikeh\AdrContracts\Action\Exception\ActionException;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
interface ConsoleActionException extends ActionException
{
}
