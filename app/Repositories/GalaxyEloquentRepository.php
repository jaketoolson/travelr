<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Galaxy;

class GalaxyEloquentRepository implements GalaxyRepository
{
    /**
     * @var Galaxy
     */
    private $model;

    public function __construct(Galaxy $galaxy)
    {
        $this->model = $galaxy;
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
