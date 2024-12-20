<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @internal
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    #[\Override()]
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropAllTables();

        $this->app['db']->connection()->getSchemaBuilder()->create('posts', function (Blueprint $blueprint): void {
            $blueprint->increments('id');
            $blueprint->binary('uuid');
            $blueprint->string('name');
        });
    }
}
