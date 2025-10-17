<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Query\Traits;

use Shrikeh\Adr\Action\Query\Exception\ErrorRunningQuery;
use Shrikeh\Cqrs\Bus\QueryBus;
use Shrikeh\Cqrs\Bus\QueryBus\Exception\QueryBusException;
use Shrikeh\Cqrs\Message\Query;
use Shrikeh\Cqrs\Message\Result;

trait HandleQuery
{
    private readonly QueryBus $queryBus;

    private function handle(Query $query): Result
    {
        try {
            return ($this->queryBus)($query);
        } catch (QueryBusException $exc) {
            throw new ErrorRunningQuery($query, $exc);
        }
    }
}
