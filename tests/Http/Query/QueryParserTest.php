<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Tests\Http\Query;

use Orion\Travelr\Http\Query\QueryParser;
use Orion\Travelr\Tests\TestCase;

class QueryParserTest extends TestCase
{
    public function testGetParameters(): void
    {
        $query = $this->createQueryParser(['foo', 'bar']);

        $this->assertEquals(['foo', 'bar'], $query->getParameters());
    }

    public function testEmptyQueryParameters(): void
    {
        $query = $this->createQueryParser([]);

        $this->assertEquals([], $query->getFields()->get());
        $this->assertEquals([], $query->getFilters()->get());
    }

    public function testGetMissingQueryParams(): void
    {
        $query = $this->createQueryParser([
            'foo',
            'bar',
            'baz' => 'biz'
        ]);

        $this->assertEquals([], $query->getFields()->get());
        $this->assertEquals([], $query->getFilters()->get());
    }

    public function testGetFields(): void
    {
        $query = $this->createQueryParser([
            'fields'  => [
                'name' => 'jake',
                'email' => 'jaketoolson@gmail.com'
            ]
        ]);

        $this->assertEquals([
            'name' => ['jake'],
            'email' => ['jaketoolson@gmail.com']
        ], $query->getFields()->get());
    }

    public function testGetFilters(): void
    {
        $query = $this->createQueryParser([
            'filter'  => [
                'name' => 'jake',
                'email' => 'jaketoolson@gmail.com'
            ]
        ]);

        $this->assertEquals([
            'name' => 'jake',
            'email' => 'jaketoolson@gmail.com'
        ], $query->getFilters()->get());
    }

    private function createQueryParser(array $parameters = null): QueryParser
    {
        return new QueryParser($parameters);
    }
}
