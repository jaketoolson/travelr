<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;

class PlanetSearchCriteria implements CriteriaInterface
{
    /**
     * @var int|null
     */
    private $galaxyId;

    /**
     * @var string|null
     */
    private $planetName;

    public function setGalaxyId(int $galaxyId = null): PlanetSearchCriteria
    {
        $this->galaxyId = $galaxyId;

        return $this;
    }

    public function setPlanetName(string $planetName = null): PlanetSearchCriteria
    {
        $this->planetName = $planetName;

        return $this;
    }

    public function apply(Builder $query): Builder
    {
        if ($this->galaxyId) {
            $query->where('galaxy_id', '=', $this->galaxyId);
        }

        if ($this->planetName) {
            $query->where('name', 'like', "%{$this->planetName}%");
        }

        return $query;
    }
}
