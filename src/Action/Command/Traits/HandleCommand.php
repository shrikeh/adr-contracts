<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Action\Traits;

use Shrikeh\AdrContracts\Action\Command\Exception\ErrorRunningCommand;
use Shrikeh\Cqrs\Bus\CommandBus;
use Shrikeh\Cqrs\Bus\CommandBus\Exception\CommandBusException;
use Shrikeh\Cqrs\Message\Command;
use Shrikeh\Cqrs\Message\Result;

trait HandleCommand
{
    private readonly CommandBus $commandBus;

    private function handle(Command $command): Result
    {
        try {
            return ($this->commandBus)($command);
        } catch (CommandBusException $exc) {
            throw new ErrorRunningCommand($command, $exc);
        }
    }
}
