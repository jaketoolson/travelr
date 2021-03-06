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

        if (array_key_exists('amenities', $filters) && $filters['amenities'] !== '') {
            $builder->whereHas('amenities', function (Builder $query) use ($filters) {
                $amenities = array_filter(explode(',', $filters['amenities']));
                $query->whereIn('amenities.id', $amenities);

                // In order to ensure the whereIn() is respected and only results that contain at least _all_ of the
                // selected amenities, the select, selectRaw, groupBy and having are required.
                // selectRaw with max() is erroneous but needed for a valid sql query with groupBY

                $query->select('amenity_planet.planet_id');
                $query->selectRaw('MAX(amenity_planet.planet_id)');

                $query->groupBy(['amenity_planet.planet_id']);
                $query->havingRaw('count(DISTINCT amenity_planet.amenity_id) >= '.count($amenities));
            });
        }

        if (array_key_exists('featured', $filters)) {
            $value = (string) $filters['featured'];
            if (in_array($value, ['true', '1', 'null'], true)) {
                $builder->featured();
            } elseif (in_array($value, ['false', '0'], true)) {
                $builder->notFeatured();
            }
        }

        return $builder;
    }
}
