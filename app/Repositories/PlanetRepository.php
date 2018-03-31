<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetSearchCriteria;

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

    /**
     * @param PlanetSearchCriteria $criteria
     * @return Collection|Planet[]
     */
    public function search(PlanetSearchCriteria $criteria): Collection;
}
