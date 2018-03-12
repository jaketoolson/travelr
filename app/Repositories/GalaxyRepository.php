<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Orion\Travelr\Galaxy;

interface GalaxyRepository
{
    public function getById(int $id): Galaxy;

    /**
     * @return Collection|Galaxy[]
     */
    public function getAll(): Collection;
}
