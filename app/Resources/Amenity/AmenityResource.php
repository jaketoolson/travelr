<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources\Amenity;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Amenity;

class AmenityResource extends Resource
{
    public static $wrap;

    public const TYPE = 'amenity';

    public function toArray($request): array
    {
        /** @var Amenity $resource */
        $resource = $this->resource;

        return array_merge(self::getIdentifiers($resource),  [
            'attributes' => $this->getMappedAttributes(),
            'links' => self::getLinks($resource),
        ]);
    }

    public static function getIdentifiers(Amenity $resource): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $resource->id,
        ];
    }

    public static function getLinks(Amenity $resource): array
    {
        return  [
            'self' => route('api.amenities.show', [$resource->id]),
        ];
    }

    protected function getMappedAttributes(): array
    {
        return [
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'slug' => $this->resource->slug,
            'is_active' => $this->resource->is_active,
        ];
    }
}
