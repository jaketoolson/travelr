<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Models\Planet;

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

    public function search(
        string $name = null,
        int $galaxyId = null
    ): Collection {
        $query = $this->model->whereRaw('1 = 1');

        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        }

        if ($galaxyId) {
            $query->where('galaxy_id', '=', $galaxyId);
        }

        return $query->get();
    }
}
