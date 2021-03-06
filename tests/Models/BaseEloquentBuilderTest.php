<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Tests\Models;

use Orion\Travelr\Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Models\BaseEloquentBuilder;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Orion\Travelr\Models\CriteriaInterface;

class BaseEloquentBuilderTest extends TestCase
{
    public function testApplyCriteriaSingleCriterion(): void
    {
        $builder = $this->getBuilder();
        $builder->getQuery()->shouldReceive('where')->once()->with('foo', '=', 'bar');

        $result = $builder->applyCriteria(new SearchCriteriaOneWhere);

        $this->assertEquals($result, $builder);
    }

    public function testApplyCriteriaMultipleCriteria(): void
    {
        $builder = $this->getBuilder();
        $builder->getQuery()->shouldReceive('where')->once()->with('foo', '>', 'bar');
        $builder->getQuery()->shouldReceive('where')->once()->with('bar', '=', 'baz');
        $builder->getQuery()->shouldReceive('where')->once()->with('fiz', '=', 'pop');

        $result = $builder->applyCriteria(new SearchCriteriaMultipleWhere)->where('fiz', '=', 'pop');

        $this->assertEquals($result, $builder);
    }

    public function testGetCriteria(): void
    {
        $builder = $this->getBuilder();
        $builder->getQuery()->shouldReceive('where')->once()->with('foo', '=', 'bar');

        $builder->applyCriteria(new SearchCriteriaOneWhere);

        $storedCriteria = $builder->getCriteria();

        $this->assertCount(1, $storedCriteria);
        $this->assertInstanceOf(SearchCriteriaOneWhere::class, $storedCriteria[0]);
    }

    protected function getBuilder()
    {
        return new BaseEloquentBuilder($this->getMockQueryBuilder());
    }

    protected function getMockQueryBuilder()
    {
        $query = $this->mock(BaseBuilder::class);
        $query->shouldReceive('from')->with('foo_table');

        return $query;
    }
}

class SearchCriteriaOneWhere implements CriteriaInterface
{
    public function apply(Builder $query): Builder
    {
        return $query->where('foo', '=', 'bar');
    }
}

class SearchCriteriaMultipleWhere implements CriteriaInterface
{
    public function apply(Builder $query): Builder
    {
        return $query->where('foo', '>', 'bar')->where('bar', '=', 'baz');
    }
}
