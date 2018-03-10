<?php

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Planet;

interface PlanetRepository
{
    public function getById(int $id): Planet;

    /**
     * @return Collection|Planet[]
     */
    public function getAll(): Collection;
}
