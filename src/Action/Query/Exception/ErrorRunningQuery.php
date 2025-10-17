<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Query\Exception;

use RuntimeException;
use Shrikeh\Cqrs\Bus\QueryBus\Exception\QueryBusException;
use Shrikeh\Cqrs\Message\Query;

final class ErrorRunningQuery extends RuntimeException implements QueryActionException
{
    public const string MSG_FORMAT = 'An error occurred running the query: %s';
    public function __construct(
        public readonly Query $command,
        QueryBusException $previous,
    ) {
        parent::__construct(
            message: sprintf(self::MSG_FORMAT, $previous->getMessage()),
            previous: $previous,
        );
    }
}
