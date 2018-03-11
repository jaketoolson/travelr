<?php

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Galaxy;

class GalaxyTransformer extends BaseTransformer
{
    /**
     * @param Galaxy $galaxy
     * @return array
     */
    public function toArray($galaxy): array
    {
        return [
            'id' => (int) $galaxy->id,
            'uuid' => $galaxy->uuid,
            'name' => $galaxy->name,
            'links' => [
                'rel' => 'self',
                'uri' => route('api.galaxy.show', [$galaxy->id]),
            ]
        ];
    }
}
