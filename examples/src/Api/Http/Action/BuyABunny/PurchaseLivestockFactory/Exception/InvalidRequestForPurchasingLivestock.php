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

namespace Examples\Api\Http\Action\BuyABunny\PurchaseLivestockFactory\Exception;

use InvalidArgumentException;
use Psr\Http\Message\ServerRequestInterface;
use Shrikeh\AdrContracts\MessageFactory\Http\Exception\HttpMessageFactoryException;
use Teapot\StatusCode;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final class InvalidRequestForPurchasingLivestock extends InvalidArgumentException implements HttpMessageFactoryException
{
    public function __construct(public readonly ServerRequestInterface $request)
    {
        parent::__construct(
            message: 'Unable to buy a bunny from this request.',
            code: StatusCode::BAD_REQUEST,
        );
    }
}
