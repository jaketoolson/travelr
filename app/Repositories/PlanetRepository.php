<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\Query\QuerySchemaInterface;

interface PlanetRepository
{
    public function getById(int $id): Planet;

    /**
     * @param QuerySchemaInterface $querySchema
     * @return Collection|Planet[]
     */
    public function query(QuerySchemaInterface $querySchema): Collection;

    /**
     * @return Collection|Planet[]
     */
    public function getAll(): Collection;
}
