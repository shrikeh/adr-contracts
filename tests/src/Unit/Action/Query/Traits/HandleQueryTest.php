<?php

declare(strict_types=1);

namespace Tests\Unit\Action\Query\Traits;

use Exception;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Shrikeh\Adr\Action\Action\Traits\HandleCommand;
use Shrikeh\Adr\Action\Query\Exception\ErrorRunningQuery;
use Shrikeh\Adr\Action\Query\Traits\HandleQuery;
use Shrikeh\Cqrs\Bus\QueryBus;
use Shrikeh\Cqrs\Bus\QueryBus\Exception\QueryBusException;
use Shrikeh\Cqrs\Message\Query;
use Shrikeh\Cqrs\Message\Result;

final class HandleQueryTest extends TestCase
{
    use ProphecyTrait;

    public function testItHandlesACommand(): void
    {
        $query = $this->prophesize(Query::class)->reveal();
        $result = $this->prophesize(Result::class)->reveal();
        $queryBus = $this->prophesize(QueryBus::class);
        $queryBus->__invoke($query)->shouldBeCalled()->willReturn($result);

        $this->assertSame(
            $result,
            $this->getAnonymousClassWithTrait($queryBus->reveal())->handle($query)
        );
    }

    public function testItThrowsAnExceptionIfCommandBusThrowsAnException(): void
    {
        $query = $this->prophesize(Query::class)->reveal();
        $queryBus = $this->prophesize(QueryBus::class);
        $msg = 'Some error';
        $exc = new class ($msg) extends Exception implements QueryBusException {
        };
        $queryBus->__invoke($query)->shouldBeCalled()->willThrow($exc);
        $this->expectExceptionObject(new ErrorRunningQuery($query, $exc));
        $this->expectExceptionMessage(sprintf(ErrorRunningQuery::MSG_FORMAT, $msg));
        $this->getAnonymousClassWithTrait($queryBus->reveal())->handle($query);
    }

    private function getAnonymousClassWithTrait(QueryBus $queryBus): object
    {
        return new class ($queryBus) {
            use HandleQuery {
                handle as public;
            }

            public function __construct(QueryBus $queryBus)
            {
                $this->queryBus = $queryBus;
            }
        };
    }
}
