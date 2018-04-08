<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\PlanetQuery;

use Orion\Travelr\Models\CriteriaInterface;
use Orion\Travelr\Models\Query\QuerySchemaInterface;

class PlanetQuerySchema implements QuerySchemaInterface
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

    public function getFilter(): CriteriaInterface
    {
        return $this->planetFilter;
    }

    public function getFieldset(): CriteriaInterface
    {
        return $this->planetFieldset;
    }
}
