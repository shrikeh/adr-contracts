<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Query\Attribute;

use Attribute;
use Shrikeh\AdrContracts\Action\Attribute\AsAction;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsQueryAction extends AsAction
{
}
