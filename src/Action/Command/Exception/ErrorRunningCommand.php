<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Command\Exception;

use RuntimeException;
use Shrikeh\Cqrs\Bus\CommandBus\Exception\CommandBusException;
use Shrikeh\Cqrs\Message\Command;

final class ErrorRunningCommand extends RuntimeException implements CommandActionException
{
    public function __construct(
        public readonly Command $command,
        CommandBusException $previous,
    ) {
        parent::__construct(
            message: sprintf('An error occurred running the command: %s', $previous->getMessage()),
            previous: $previous,
        );
    }
}
