<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Tests\Unit\Models;

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

        $criteria = collect([new SearchCriteriaOneWhere]);

        $result = $builder->applyCriteria($criteria);

        $this->assertEquals($result, $builder);
    }

    public function testApplyCriteriaMultipleCriteria(): void
    {
        $builder = $this->getBuilder();
        $builder->getQuery()->shouldReceive('where')->once()->with('foo', '=', 'bar');
        $builder->getQuery()->shouldReceive('where')->once()->with('bar', '=', 'baz');
        $builder->getQuery()->shouldReceive('where')->once()->with('fiz', '=', 'pop');

        $criteria = collect([new SearchCriteriaMulitpleWhere]);

        $result = $builder->applyCriteria($criteria)->where('fiz', '=', 'pop');

        $this->assertEquals($result, $builder);
    }

    public function testGetCriteria(): void
    {
        $builder = $this->getBuilder();
        $builder->getQuery()->shouldReceive('where')->once()->with('foo', '=', 'bar');

        $criteria = collect([new SearchCriteriaOneWhere]);

        $builder->applyCriteria($criteria);

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

class SearchCriteriaMulitpleWhere implements CriteriaInterface
{
    public function apply(Builder $query): Builder
    {
        return $query->where('foo', '=', 'bar')->where('bar', '=', 'baz');
    }
}
