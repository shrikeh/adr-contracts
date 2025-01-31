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

namespace Examples\Api\Http\Action\BuyABunny;

use Examples\App\Result\LivestockPurchased;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Shrikeh\AdrContracts\Responder\Exception\UnsupportedResultType;
use Shrikeh\AdrContracts\Responder\HttpResponder;
use Shrikeh\App\Message\Result;
use Teapot\StatusCode;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final readonly class LivestockPurchasedResponder implements HttpResponder
{

    public function __construct(private ResponseFactoryInterface $responseFactory)
    {
    }

    public function respond(ServerRequestInterface $request, ?Result $result = null): ResponseInterface
    {
        if (!$this->supports($request, $result)) {
            throw new UnsupportedResultType($this, $result);
        }

        return $this->responseFactory->createResponse(
            StatusCode::CREATED
        );
    }


    public function supports(ServerRequestInterface $request, Result $result = null): bool
    {
        return $result instanceof LivestockPurchased;
    }
}
