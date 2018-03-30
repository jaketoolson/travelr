<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Models\Terrain;

class TerrainTransformer extends BaseHttpResource
{
    public function toArray($request): array
    {
        /** @var Terrain $terrain */
        $terrain = $this->getResource();

        return [
            'id' => (int) $terrain->id,
            'uuid' => $terrain->uuid,
            'name' => $terrain->name,
            'description' => $terrain->description,
            'links' => [
                'rel' => 'self',
                'uri' => route('api.galaxy.show', [$terrain->id]),
            ]
        ];
    }
}
