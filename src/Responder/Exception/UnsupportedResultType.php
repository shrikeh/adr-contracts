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

namespace Shrikeh\AdrContracts\Responder\Exception;

use InvalidArgumentException;
use Shrikeh\AdrContracts\Responder;
use Shrikeh\App\Message\Result;

/**
 * @author Barney Hanlon <symfony@shrikeh.net>
 */
final class UnsupportedResultType extends InvalidArgumentException implements ResponderException
{
    public const string MSG = 'Responder of type %s does not support result of type %s';

    public function __construct(
        public readonly Responder $responder,
        public readonly ?Result $result = null
    ) {
        parent::__construct(
            sprintf(
                self::MSG,
            get_class($this->responder),
            $this->result ? get_class($this->result) : 'null'
            )
        );
    }
}
