<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\MessageFactory\QueryFactory\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsQueryFactory
{
    /**
     * @var array<string> An array of classes or interfaces this query factory returns
     */
    public array $queries;
    public function __construct(string ...$queries)
    {
        $this->queries = array_unique($queries);
    }
}
