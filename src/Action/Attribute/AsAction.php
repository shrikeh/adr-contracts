<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Attribute;

use Shrikeh\Adr\Action\Type;

/**
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 * @psalm-api
 */
abstract readonly class AsAction
{
    protected function __construct(public Type $type)
    {
    }
}
