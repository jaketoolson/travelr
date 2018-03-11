<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Terrain;

class TerrainTransformer extends BaseTransformer
{
    /**
     * @param Terrain $terrain
     * @return array
     */
    public function toArray($terrain): array
    {
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
