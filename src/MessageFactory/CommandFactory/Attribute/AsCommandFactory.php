<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\MessageFactory\CommandFactory\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsCommandFactory
{
    /**
     * @var array<string> An array of classes or interfaces this command factory returns
     */
    public array $commands;
    public function __construct(string ...$commands)
    {
        $this->commands = array_unique($commands);
    }
}
