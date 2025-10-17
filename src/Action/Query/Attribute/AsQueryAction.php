<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action\Query\Attribute;

use Attribute;
use Shrikeh\Adr\Action\Attribute\AsAction;
use Shrikeh\Adr\Action\Type;

/**
 * @SuppressWarnings("PHPMD.NumberOfChildren")
 * @psalm-api
 */
#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsQueryAction extends AsAction
{
    public function __construct()
    {
        parent::__construct(Type::QUERY_ACTION);
    }
}
