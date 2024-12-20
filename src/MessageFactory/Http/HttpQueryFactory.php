<?php

/*
 * This file is part of Barney's Symfony skeleton for Domain-Driven Design
 *
 * (c) Barney Hanlon <symfony@shrikeh.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Shrikeh\AdrContracts\MessageFactory\Http;

use Psr\Http\Message\ServerRequestInterface;
use Shrikeh\AdrContracts\MessageFactory\HttpMessageFactory;
use Shrikeh\App\Message\Query;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
interface HttpQueryFactory extends HttpMessageFactory
{
    public function build(ServerRequestInterface $request): Query;
}
