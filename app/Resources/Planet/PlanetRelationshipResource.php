<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Resources\File\FileIdentifierObject;
use Orion\Travelr\Resources\File\FileTransformer;
use Orion\Travelr\Resources\Galaxy\GalaxyIdentifierObject;

class PlanetRelationshipResource extends Resource
{
    public function toArray($request): array
    {
        /** @var Planet $planet */
        $planet = $this->resource;

        return [
            'photo' => [
                'links' => FileTransformer::getLinks($planet->photo),
                'data' => new FileIdentifierObject($planet->photo),
            ],
            'galaxy' => [
                'links' => [
                    'self' => route('api.galaxies.show', [$planet->galaxy_id]),
                ],
                'data' => $planet->galaxy ? new GalaxyIdentifierObject($planet->galaxy) : null,
                'meta' => [
                    'name' => $planet->galaxy ? $planet->galaxy->name : null,
                ]
            ],
            'amenities' => new PlanetAmenitiesRelationshipResource($planet->amenities),
            'terrains' => $planet->terrains ? new PlanetTerrainsRelationshipResource($planet->terrains) : null,
        ];
    }
}
