<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Terrain;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Terrain;

class TerrainResource extends Resource
{
    public static $wrap;

    public function toArray($request): array
    {
        /** @var Terrain $planet */
        $terrain = $this->resource;

        return [
            'type' => 'terrains',
            'id' => (string) $terrain->id,
            'attributes' => [
                'name' => $terrain->name,
                'description' => $terrain->description,
            ],
            'links' => self::getLinks($terrain),
        ];
    }

    public static function getLinks(Terrain $terrain): array
    {
        return  [
            'self' => route('api.terrains.show', [$terrain->id]),
        ];
    }
}
