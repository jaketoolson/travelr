<?php

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Entities\PlanetEntity;

interface PlanetRepository
{
    public function getById(int $id): PlanetEntity;

    /**
     * @return Collection|PlanetEntity[]
     */
    public function getAll(): Collection;
}
