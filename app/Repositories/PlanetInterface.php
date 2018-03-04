<?php

namespace Orion\Travelr\Repositories;

use Orion\Travelr\Entities\PlanetEntity;

interface PlanetInterface
{
    public function getById(int $id): PlanetEntity;
}

