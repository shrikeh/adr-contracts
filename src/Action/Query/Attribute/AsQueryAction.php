<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Query\Attribute;

use Attribute;
use Shrikeh\Adr\Action\Attribute\AsAction;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsQueryAction extends AsAction
{
}
