<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests;

use Mockery;
use Mockery\MockInterface;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public function mockAndBind(string $class): MockInterface
    {
        $mock = $this->mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }

    public function mock(string $class): MockInterface
    {
        return Mockery::mock($class);
    }
}
