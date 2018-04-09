<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\PlanetQuery;

class PlanetIncludes
{
    private $includes = [];

    public function __construct(array $includes)
    {
        $this->includes = $includes;
    }

    public function defaultIncludes(): array
    {
        return [
            'photo',
        ];
    }
}
