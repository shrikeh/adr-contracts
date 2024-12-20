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

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

define('PROJECT_ROOT_DIR', dirname(__DIR__, 2));

ini_set('memory_limit', '-1');
if (file_exists(PROJECT_ROOT_DIR . '/config/bootstrap.php')) {
    require PROJECT_ROOT_DIR . '/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(PROJECT_ROOT_DIR . '/.env');
}
