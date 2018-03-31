<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Query\Builder;

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

    public function __construct(int $galaxyId = null, string $planetName = null)
    {
        $this->galaxyId = $galaxyId;
        $this->planetName = $planetName;
    }

    public function apply(Builder $query): Builder
    {
        if ($this->galaxyId) {
            $query->where('galaxy_id', '=', $this->galaxyId);
        }

        if ($this->planetName) {
            $query->where('name', 'like', '');
        }

        return $query;
    }
}
