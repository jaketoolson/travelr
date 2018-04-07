<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Galaxy;

use Orion\Travelr\Models\Galaxy;
use Illuminate\Http\Resources\Json\Resource;

class GalaxyResource extends Resource
{
    public static $wrap;

    public const TYPE = 'galaxy';

    public function toArray($request): array
    {
        /** @var Galaxy $galaxy */
        $galaxy = $this->resource;

        return array_merge(self::getIdentifiers($galaxy), [
            'attributes' => [
                'name' => $galaxy->name,
            ],
            'links' => self::getLinks($galaxy),
        ]);
    }

    public static function getIdentifiers(Galaxy $galaxy): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $galaxy->id,
        ];
    }

    public static function getLinks(Galaxy $galaxy): array
    {
        return  [
            'self' => route('api.galaxies.show', [$galaxy->id]),
        ];
    }
}
