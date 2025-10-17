<?php

declare(strict_types=1);

namespace Shrikeh\Adr\MessageFactory\Attribute;

use Shrikeh\Adr\MessageFactory\Type;

/**
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 * @psalm-api
 */
abstract readonly class AsMessageFactory
{
    protected function __construct(public Type $type)
    {
    }
}
