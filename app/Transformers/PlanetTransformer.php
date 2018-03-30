<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Transformers;

use Orion\Travelr\Models\Planet;

class PlanetTransformer extends BaseHttpResource
{
    public function toArray($request): array
    {
        /** @var Planet $planet */
        $planet = $this->getResource();

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
            'price_dollars' => (int) $planet->price_dollars,
            'photo' => new FileTransformer($planet->photo),
            'relationships' => [
                'galaxy' => $planet->galaxy ? new GalaxyTransformer($planet->galaxy) : null,
                'terrains' => $planet->terrains ? TerrainTransformer::collection($planet->terrains) : null,
            ],
            'links' => [
                'rel' => 'self',
                'uri' => route('api.planet.show', [$planet->id]),
            ]
        ];
    }
}
