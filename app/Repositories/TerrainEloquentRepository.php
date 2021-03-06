<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Terrain;

class TerrainEloquentRepository extends BaseEloquentRepository implements TerrainRepository
{
    public function model(): string
    {
        return Terrain::class;
    }

    public function getById(int $id): Terrain
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function getAll(): Collection
    {
        return $this->newQuery()->orderBy('name', 'asc')->get();
    }
}
