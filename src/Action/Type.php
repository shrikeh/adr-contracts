<?php

declare(strict_types=1);

namespace Shrikeh\Adr\Action;

enum Type: string
{
    case QUERY_ACTION = 'action.query';
    case COMMAND_ACTION = 'action.command';
}
