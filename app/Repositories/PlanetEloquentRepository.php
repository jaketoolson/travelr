<?php

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
        return $this->model->get();
    }
}
