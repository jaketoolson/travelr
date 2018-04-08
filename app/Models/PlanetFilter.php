<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;

class PlanetFilter implements CriteriaInterface
{
    private $filters = [];

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function apply(Builder $builder): Builder
    {
        $filters = $this->filters;

        if (array_key_exists('name', $filters)) {
            $builder->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (array_key_exists('galaxy_id', $filters)) {
            $builder->where('galaxy_id', '=', $filters['galaxy_id']);
        }

        return $builder;
    }
}
