<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Planet;

use Orion\Travelr\Http\Query\QueryParser;
use Orion\Travelr\Models\Planet;
use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Resources\ResourceParameterMappers;

/**
 * FIXME: WIP, need to refactor to use a strategy pattern or decorate perhaps.
 */
class PlanetResource extends Resource
{
    use ResourceParameterMappers;

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
            'attributes' => $this->getMappedAttributes(),
            'relationships' => new PlanetRelationshipResource($this),
            'links' => self::getLinks($this->resource),
        ]);
    }

    public function getMappedAttributes(): array
    {
        return [
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'diameter' => (int) $this->resource->diameter,
            'climate' => (int) $this->resource->climate,
            'rotation_period_hours' => (int) $this->resource->rotation_period_hours,
            'population' => (int) $this->resource->population,
            'price_cents' => (int) $this->resource->price_cents,
            'price_dollars' => (int) $this->resource->price_dollars,
            'featured' => (bool) $this->resource->featured,
        ];
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
