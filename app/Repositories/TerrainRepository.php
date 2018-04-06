<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Terrain;

interface TerrainRepository
{
    public function getById(int $id): Terrain;

    /**
     * @return Collection|Terrain[]
     */
    public function getAll(): Collection;
}
