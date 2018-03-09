<?php

namespace Orion\Travelr\Repositories;

use Orion\Travelr\Builder;
use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Entities\PlanetEntity;
use Orion\Travelr\Planet;

class PlanetRepository implements PlanetInterface
{
    private $model;

    public function __construct(Planet $planet)
    {
        $this->model = $planet;
    }

    public function query(): Builder
    {
        return $this->model::query();
    }

    public function getById(int $id): PlanetEntity
    {
        return $this->query()->findOrFail($id)->transformToEntity();
    }

    public function getAll(): Collection
    {
        return $this->query()->transformToEntities($this->model->get());
    }
}
