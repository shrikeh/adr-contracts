<?php

declare(strict_types=1);

namespace Shrikeh\Adr\MessageFactory\CommandFactory\Attribute;

use Attribute;
use Shrikeh\Adr\MessageFactory\Attribute\AsMessageFactory;
use Shrikeh\Adr\MessageFactory\Type;

/**
 * @psalm-api
 */
#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsCommandFactory extends AsMessageFactory
{
    /**
     * @var array<string> An array of classes or interfaces this command factory returns
     */
    public array $commands;
    public function __construct(string ...$commands)
    {
        $this->commands = array_unique($commands);
        parent::__construct(Type::COMMAND_FACTORY);
    }
}
