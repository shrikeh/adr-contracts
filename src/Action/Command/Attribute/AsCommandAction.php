<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Action\Command\Attribute;

use Attribute;
use Shrikeh\AdrContracts\Action\Attribute\AsAction;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsCommandAction extends AsAction
{
}
