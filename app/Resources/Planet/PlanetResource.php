<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Orion\Travelr\Models\Planet;
use Illuminate\Http\Resources\Json\Resource;

class PlanetResource extends Resource
{
    public static $wrap;

    public function toArray($request): array
    {
        /** @var Planet $planet */
        $planet = $this->resource;

        return [
            'type' => 'planets',
            'id' => (string) $planet->id,
            'attributes' => [
                'name' => $planet->name,
                'description' => $planet->description,
                'diameter' => (int) $planet->diameter,
                'climate' => (int) $planet->climate,
                'rotation_period_hours' => (int) $planet->rotation_period_hours,
                'population' => (int) $planet->population,
                'price_cents' => (int) $planet->price_cents,
                'price_dollars' => (int) $planet->price_dollars,
                'featured' => (bool) $planet->featured,
            ],
            'relationships' => new PlanetRelationshipResource($this),
            'links' => self::getLinks($planet),
        ];
    }

    public static function getIdentifiers(Planet $planet): array
    {
        return [
            'type' => 'planets',
            'id' => (string) $planet->id,
        ];
    }

    public static function getLinks(Planet $planet): array
    {
        return [
            'self' => route('api.planets.show', [$planet->id]),
        ];
    }
}
