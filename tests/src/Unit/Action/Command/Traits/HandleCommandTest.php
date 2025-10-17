<?php

declare(strict_types=1);

namespace Tests\Unit\Action\Command\Traits;

use Exception;
use PHPUnit\Framework\Attributes\Group;
use Prophecy\PhpUnit\ProphecyTrait;
use Shrikeh\Adr\Action\Command\Traits\HandleCommand;
use PHPUnit\Framework\TestCase;
use Shrikeh\Adr\Action\Command\Exception\ErrorRunningCommand;
use Shrikeh\Cqrs\Bus\CommandBus;
use Shrikeh\Cqrs\Bus\CommandBus\Exception\CommandBusException;
use Shrikeh\Cqrs\Message\Command;
use Shrikeh\Cqrs\Message\Result;

#[Group('Action')]
#[Group('Traits')]
#[Group('Command')]
final class HandleCommandTest extends TestCase
{
    use ProphecyTrait;

    public function testItHandlesACommand(): void
    {
        $command = $this->prophesize(Command::class)->reveal();
        $result = $this->prophesize(Result::class)->reveal();
        $commandBus = $this->prophesize(CommandBus::class);
        $commandBus->__invoke($command)->shouldBeCalled()->willReturn($result);

        $this->assertSame(
            $result,
            $this->getAnonymousClassWithTrait($commandBus->reveal())->handle($command)
        );
    }

    public function testItThrowsAnExceptionIfCommandBusThrowsAnException(): void
    {
        $command = $this->prophesize(Command::class)->reveal();
        $commandBus = $this->prophesize(CommandBus::class);
        $msg = 'Handler error';
        $exc = new class ($msg) extends Exception implements CommandBusException {
        };
        $commandBus->__invoke($command)->shouldBeCalled()->willThrow($exc);
        $this->expectExceptionObject(new ErrorRunningCommand($command, $exc));
        $this->expectExceptionMessage(sprintf(ErrorRunningCommand::MSG_FORMAT, $msg));
        $this->getAnonymousClassWithTrait($commandBus->reveal())->handle($command);
    }

    private function getAnonymousClassWithTrait(CommandBus $commandBus): object
    {
        return new class ($commandBus) {
            use HandleCommand {
                handle as public;
            }

            public function __construct(CommandBus $commandBus)
            {
                $this->commandBus = $commandBus;
            }
        };
    }
}
