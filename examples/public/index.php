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

use Shrikeh\ApiContext\Context\Http;

defined('APP_ROOT_DIR_LEVELS') || define('APP_ROOT_DIR_LEVELS', 1);

defined('APP_ROOT_DIR') || define('APP_ROOT_DIR', dirname(__DIR__, APP_ROOT_DIR_LEVELS));

require_once APP_ROOT_DIR . '/../vendor/autoload_runtime.php';

return new Http(APP_ROOT_DIR);
