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

    public const TYPE = 'terrain';

    public function toArray($request): array
    {
        /** @var Terrain $planet */
        $terrain = $this->resource;

        return array_merge(self::getIdentifiers($terrain),  [
            'attributes' => $this->getMappedAttributes(),
            'links' => self::getLinks($terrain),
        ]);
    }

    public static function getIdentifiers(Terrain $terrain): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $terrain->id,
        ];
    }

    public static function getLinks(Terrain $terrain): array
    {
        return  [
            'self' => route('api.terrains.show', [$terrain->id]),
        ];
    }

    protected function getMappedAttributes(): array
    {
        return [
            'name' => $this->resource->name,
            'description' => $this->resource->description,
        ];
    }
}
