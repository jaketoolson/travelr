<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetQuerySchema;

interface PlanetRepository
{
    public function getById(int $id): Planet;

    /**
     * @param PlanetQuerySchema $querySchema
     * @return Collection|Planet[]
     */
    public function query(PlanetQuerySchema $querySchema): Collection;

    /**
     * @return Collection|Planet[]
     */
    public function getAll(): Collection;
}
