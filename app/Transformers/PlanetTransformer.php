<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Planet;

class PlanetTransformer extends BaseTransformer
{
    /**
     * @param Planet $planet
     * @return array
     */
    public function toArray($planet): array
    {
        return [
            'id' => (int) $planet->id,
            'uuid' => $planet->uuid,
            'name' => $planet->name,
            'description' => $planet->description,
            'diameter' => (int) $planet->diameter,
            'climate' => (int) $planet->climate,
            'rotation_period_hours' => (int) $planet->rotation_period_hours,
            'population' => (int) $planet->population,
            'price_cents' => (int) $planet->price_cents,
            'price_dollars' => (float) $planet->price_dollars,
            'photo' => FileTransformer::transformToArray($planet->photo),
            'relationships' => [
                'galaxy' => GalaxyTransformer::transformToArray($planet->galaxy),
                'terrains' => TerrainTransformer::transformToArray($planet->terrains),
            ],
            'links' => [
                'rel' => 'self',
                'uri' => route('api.planet.show', [$planet->id]),
            ]
        ];
    }
}
