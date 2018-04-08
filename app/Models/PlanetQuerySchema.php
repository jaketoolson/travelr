<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

class PlanetQuerySchema
{
    /**
     * @var PlanetFilter
     */
    private $planetFilter;

    /**
     * @var PlanetFieldset
     */
    private $planetFieldset;

    public const RESOURCE_TYPE = 'planet';

    public function __construct(
        PlanetFilter $planetFilter,
        PlanetFieldset $planetFieldset
    ) {
        $this->planetFilter = $planetFilter;
        $this->planetFieldset = $planetFieldset;
    }

    public function getPlanetFilter(): PlanetFilter
    {
        return $this->planetFilter;
    }

    public function getPlanetFieldset(): PlanetFieldset
    {
        return $this->planetFieldset;
    }
}
