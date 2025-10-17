<?php

declare(strict_types=1);

namespace Tests\Unit\Action\Query\Attribute;

use Shrikeh\Adr\Action\Query\Attribute\AsQueryAction;
use PHPUnit\Framework\TestCase;
use Shrikeh\Adr\Action\Type;

final class AsQueryActionTest extends TestCase
{
    public function testItIsAQueryAction(): void
    {
        $this->assertSame(Type::QUERY_ACTION, new AsQueryAction()->type);
    }
}
