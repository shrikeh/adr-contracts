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

namespace Shrikeh\AdrContracts\MessageFactory\Console;

use Shrikeh\AdrContracts\MessageFactory\ConsoleMessageFactory;
use Shrikeh\App\Message\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
interface ConsoleCommandFactory extends ConsoleMessageFactory
{
    public function build(InputInterface $input, ?OutputInterface $output = null): Command;
}
