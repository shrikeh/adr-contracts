<?php

declare(strict_types=1);

namespace Tests\Unit\Responder\Attribute;

use Shrikeh\Adr\Responder\Attribute\AsResponder;
use PHPUnit\Framework\TestCase;

final class AsResponderTest extends TestCase
{
    public function testItSupportsNoResult(): void
    {
        $results = [
            null,
        ];
        $attribute = new AsResponder(...$results);
        $this->assertSame($results, $attribute->results);
    }

    public function testItRemovesDuplicates(): void
    {
        $results = [
            null,
            'SomeResult',
            'AnotherResult',
            'SomeResult',
        ];
        $attribute = new AsResponder(...$results);
        $this->assertSame(array_unique($results), $attribute->results);
    }
}
