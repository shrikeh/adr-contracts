<?php

declare(strict_types=1);

namespace Shrikeh\Adr\MessageFactory\QueryFactory\Attribute;

use Attribute;
use Shrikeh\Adr\MessageFactory\Attribute\AsMessageFactory;
use Shrikeh\Adr\MessageFactory\Type;

/**
 * @psalm-api
 */
#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsQueryFactory extends AsMessageFactory
{
    /**
     * @var array<string> An array of classes or interfaces this query factory returns
     */
    public array $queries;
    public function __construct(string ...$queries)
    {
        $this->queries = array_unique($queries);
        parent::__construct(Type::QUERY_FACTORY);
    }
}
