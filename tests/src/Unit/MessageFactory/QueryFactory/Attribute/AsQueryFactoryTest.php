<?php

declare(strict_types=1);

namespace Tests\Unit\MessageFactory\QueryFactory\Attribute;

use Shrikeh\Adr\MessageFactory\CommandFactory\Attribute\AsCommandFactory;
use Shrikeh\Adr\MessageFactory\QueryFactory\Attribute\AsQueryFactory;
use PHPUnit\Framework\TestCase;
use Shrikeh\Adr\MessageFactory\Type;

final class AsQueryFactoryTest extends TestCase
{
    public function testItIsAQueryFactory(): void
    {
        $queries = [
            'SomeQuery',
            'SomeOtherQuery',
        ];
        $attribute = new AsQueryFactory(...$queries);
        $this->assertSame(Type::QUERY_FACTORY, $attribute->type);
        $this->assertSame($queries, $attribute->queries);
    }

    public function testItRemovesDuplicates(): void
    {
        $queries = [
            'SomeQuery',
            'SomeQuery',
        ];
        $attribute = new AsQueryFactory(...$queries);
        $this->assertSame(array_unique($queries), $attribute->queries);
    }
}
