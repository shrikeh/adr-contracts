<?php

declare(strict_types=1);

namespace Tests\Unit\MessageFactory\CommandFactory\Attribute;

use Shrikeh\Adr\MessageFactory\CommandFactory\Attribute\AsCommandFactory;
use PHPUnit\Framework\TestCase;
use Shrikeh\Adr\MessageFactory\Type;

final class AsCommandFactoryTest extends TestCase
{
    public function testItIsACommandFactory(): void
    {
        $commands = [
            'SomeCommand',
            'SomeOtherCommand',
        ];
        $attribute = new AsCommandFactory(...$commands);
        $this->assertSame(Type::COMMAND_FACTORY, $attribute->type);
        $this->assertSame($commands, $attribute->commands);
    }

    public function testItRemovesDuplicates(): void
    {
        $commands = [
            'SomeCommand',
            'SomeCommand',
        ];
        $attribute = new AsCommandFactory(...$commands);
        $this->assertSame(array_unique($commands), $attribute->commands);
    }
}
