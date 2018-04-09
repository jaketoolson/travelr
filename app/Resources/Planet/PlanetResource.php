<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Orion\Travelr\Http\Query\QueryParser;
use Orion\Travelr\Models\Planet;
use Illuminate\Http\Resources\Json\Resource;

/**
 * FIXME: WIP, need to refactor to use a strategy pattern or decorate perhaps.
 */
class PlanetResource extends Resource
{
    public static $wrap;

    /**
     * @var Planet
     */
    public $resource;

    public const TYPE = 'planet';

    /**
     * @param QueryParser $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(self::getIdentifiers($this->resource),  [
            'attributes' => $this->resource->getMappedAttributesToArray(),
            'relationships' => new PlanetRelationshipResource($this->resource),
            'links' => self::getLinks($this->resource),
        ]);
    }

    public static function getIdentifiers(Planet $planet): array
    {
        return [
            'type' => self::TYPE,
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
