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

        $this->assertEquals([], $query->getFields());
        $this->assertEquals([], $query->getFilters());
    }

    public function testGetMissingQueryParams(): void
    {
        $query = $this->createQueryParser([
            'foo',
            'bar',
            'baz' => 'biz'
        ]);

        $this->assertEquals([], $query->getFields());
        $this->assertEquals([], $query->getFilters());
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
        ], $query->getFields());
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
        ], $query->getFilters());
    }

    private function createQueryParser(array $parameters = null): QueryParser
    {
        return new QueryParser($parameters);
    }
}
