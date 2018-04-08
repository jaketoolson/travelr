<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetQuerySchema;

/**
 * @property Planet $model
 */
class PlanetEloquentRepository extends BaseEloquentRepository implements PlanetRepository
{
    public function model(): string
    {
        return Planet::class;
    }

    public function getById(int $id): Planet
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function query(PlanetQuerySchema $querySchema): Collection
    {
        $query = $this->newQuery();

        $filters = $querySchema->getPlanetFilter()->getFilters();
        if ($filters) {
            $query->applyCriteria($querySchema->getPlanetFilter());
        }

        $fieldsets = $querySchema->getPlanetFieldset();
        if ($fieldsets) {
            $query->applyCriteria($querySchema->getPlanetFieldset());
        }

        return $query->get();
    }

    public function getAll(): Collection
    {
        return $this->newQuery()->orderBy('created_at', 'asc')->get();
    }
}
