<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
abstract readonly class AsAction
{
}
