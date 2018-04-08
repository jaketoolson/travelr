<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\PlanetQuery;

use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Models\CriteriaInterface;
use Orion\Travelr\Models\Query\BaseFilter;

class PlanetFilter extends BaseFilter implements CriteriaInterface
{
    public function apply(Builder $builder): Builder
    {
        $filters = $this->getFilters();

        if (array_key_exists('name', $filters)) {
            $builder->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (array_key_exists('galaxy_id', $filters)) {
            $builder->where('galaxy_id', '=', $filters['galaxy_id']);
        }

        return $builder;
    }
}
