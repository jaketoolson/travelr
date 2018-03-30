<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Models\Planet;

interface PlanetRepository
{
    public function getById(int $id): Planet;

    /**
     * @return Collection|Planet[]
     */
    public function getAll(): Collection;

    /**
     * @param int $limit
     * @return Collection|Planet[]
     */
    public function getFeatured(int $limit = 4): Collection;
}
