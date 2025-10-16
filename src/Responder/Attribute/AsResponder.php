<?php

declare(strict_types=1);

namespace Shrikeh\AdrContracts\Responder\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AsResponder
{
    /**
     * @var array|null[]|string[] An array of supported result types
     */
    public array $results;
    public function __construct(string|null ...$results)
    {
        $this->results = array_unique($results);
    }
}
