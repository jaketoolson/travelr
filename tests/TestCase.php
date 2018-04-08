<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Mockery;
use Mockery\MockInterface;

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

    public function assertJsonResponseEqualsArray(TestResponse $response, array $expected): void
    {
        $expected = json_decode(json_encode($expected), true);
        $actual = json_decode($response->getContent(), true);

        $this->assertEquals($expected, $actual);
    }
}
