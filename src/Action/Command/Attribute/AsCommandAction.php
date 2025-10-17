<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Command\Attribute;

use Attribute;
use Shrikeh\Adr\Action\Attribute\AsAction;
use Shrikeh\Adr\Action\Type;

/**
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 * @psalm-api
 */
#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsCommandAction extends AsAction
{
    public function __construct()
    {
        parent::__construct(Type::COMMAND_ACTION);
    }
}
