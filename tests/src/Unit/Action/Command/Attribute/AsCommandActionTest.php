<?php

declare(strict_types=1);

namespace Tests\Unit\Action\Command\Attribute;

use Shrikeh\Adr\Action\Command\Attribute\AsCommandAction;
use PHPUnit\Framework\TestCase;
use Shrikeh\Adr\Action\Type;

final class AsCommandActionTest extends TestCase
{
    public function testItIsACommandAction(): void
    {
        $this->assertSame(Type::COMMAND_ACTION, new AsCommandAction()->type);
    }
}
