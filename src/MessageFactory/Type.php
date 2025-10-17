<?php

declare(strict_types=1);

namespace Shrikeh\Adr\MessageFactory;

enum Type: string
{
    case COMMAND_FACTORY = 'command.factory';
    case QUERY_FACTORY = 'query.factory';
}
