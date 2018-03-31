<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetSearchCriteria;

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
        return $this->model->findOrFail($id);
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('created_at', 'asc')->get();
    }

    public function getFeatured(int $limit = 4): Collection
    {
        return $this->model->featured()->inRandomOrder()->limit($limit)->get();
    }

    public function search(PlanetSearchCriteria $criteria): Collection
    {
        // FIXME: applyCriteria wants a collection of criteria.  This is implemented gross.
        $query = $this->model->applyCriteria(collect([$criteria]));

        return $query->get();
    }
}
