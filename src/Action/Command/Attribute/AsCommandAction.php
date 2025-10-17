<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Command\Attribute;

use Attribute;
use Shrikeh\Adr\Action\Attribute\AsAction;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsCommandAction extends AsAction
{
}
