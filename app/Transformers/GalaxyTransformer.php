<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Models\Galaxy;

class GalaxyTransformer extends BaseHttpResource
{
    public function toArray($request): array
    {
        /** @var Galaxy $galaxy */
        $galaxy = $this->getResource();

        return [
            'id' => (int) $galaxy->id,
            'uuid' => $galaxy->uuid,
            'name' => $galaxy->name,
            'planets_count' => (int) $galaxy->planets->count(),
            'links' => [
                'rel' => 'self',
                'uri' => route('api.galaxy.show', [$galaxy->id]),
            ]
        ];
    }
}
