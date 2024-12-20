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

namespace Tests\Unit\Responder\Exception;

use Prophecy\PhpUnit\ProphecyTrait;
use Shrikeh\AdrContracts\Responder;
use Shrikeh\AdrContracts\Responder\Exception\UnsupportedResultType;
use PHPUnit\Framework\TestCase;
use Shrikeh\App\Message\Result;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final class UnsupportedResultTypeTest extends TestCase
{
    use ProphecyTrait;

    public function testItHasAMessageBasedOnTheResponder(): void
    {
        $responder = $this->prophesize(Responder::class)->reveal();
        $result = $this->prophesize(Result::class)->reveal();

        $unexpectedResultType = new UnsupportedResultType($responder, $result);
        $this->assertSame(
            sprintf(UnsupportedResultType::MSG, get_class($responder), get_class($result)),
            $unexpectedResultType->getMessage(),
        );
    }
}
