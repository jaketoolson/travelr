<?php

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Entities\PlanetEntity;

interface PlanetInterface
{
    public function getById(int $id): PlanetEntity;

    public function getAll(): Collection;
}
