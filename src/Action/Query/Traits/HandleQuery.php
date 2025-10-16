<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Query\Traits;

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
