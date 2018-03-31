<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Galaxy;

class GalaxyEloquentRepository extends BaseEloquentRepository implements GalaxyRepository
{
    public function model(): string
    {
        return Galaxy::class;
    }

    public function getById(int $id): Galaxy
    {
        return $this->model->findOrFail($id);
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('name', 'asc')->get();
    }
}
