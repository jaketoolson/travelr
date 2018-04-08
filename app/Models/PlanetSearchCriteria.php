<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;

class PlanetSearchCriteria implements CriteriaInterface
{
    private $filters = [];

    public function getFilterables(): array
    {
        return [
            'galaxy_id' => '=',
            'name' => 'like',
            'featured' => '<>',
        ];
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function addFilterable(string $key, $value): PlanetSearchCriteria
    {
        $this->filters[$key] = $value;

        return $this;
    }

    public function apply(Builder $query): Builder
    {
        $filters = $this->getFilters();
        $filterables = $this->getFilterables();

        if (count($filters) > 0) {
            foreach ($filters as $filterOn => $value) {
                if (array_key_exists($filterOn, $filterables)) {
                    $operator = $filterables[$filterOn];
                    $query->where($filterOn, $operator, $this->wrapValueBasedOnOperator($operator, $value));
                }
            }
        }

        return $query;
    }

    private function wrapValueBasedOnOperator(string $operator, $value)
    {
        if ($operator === 'like') {
            return "%$value%";
        }

        return $value;
    }
}
