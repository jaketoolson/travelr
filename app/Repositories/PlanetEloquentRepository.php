<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Planet;

class PlanetEloquentRepository implements PlanetRepository
{
    /**
     * @var Planet
     */
    private $model;

    public function __construct(Planet $planet)
    {
        $this->model = $planet;
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
        return $this->model->inRandomOrder()->limit($limit)->get();
    }
}
