<?php

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Entities\PlanetEntity;
use Orion\Travelr\Planet;

class PlanetRepository implements PlanetInterface
{
    private $model;

    public function __construct(Planet $planet)
    {
        $this->model = $planet;
    }

    public function getById(int $id): PlanetEntity
    {
        return $this->model->findOrFail($id)->transformToEntity();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
