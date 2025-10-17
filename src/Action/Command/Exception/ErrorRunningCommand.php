<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Command\Exception;

use RuntimeException;
use Shrikeh\Cqrs\Bus\CommandBus\Exception\CommandBusException;
use Shrikeh\Cqrs\Message\Command;

final class ErrorRunningCommand extends RuntimeException implements CommandActionException
{
    public const string MSG_FORMAT = 'An error occurred running the command: %s';
    public function __construct(
        public readonly Command $command,
        CommandBusException $previous,
    ) {
        parent::__construct(
            message: sprintf(self::MSG_FORMAT, $previous->getMessage()),
            previous: $previous,
        );
    }
}
