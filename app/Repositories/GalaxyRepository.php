<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Models\Galaxy;

interface GalaxyRepository
{
    public function getById(int $id): Galaxy;

    /**
     * @return Collection|Galaxy[]
     */
    public function getAll(): Collection;
}
