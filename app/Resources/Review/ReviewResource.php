<?php
/**
 * Copyright (c) 2020. Jake Toolson
 */

namespace Orion\Travelr\Resources\Review;

use Illuminate\Http\Resources\Json\Resource;
use Orion\Travelr\Models\Review;

class ReviewResource extends Resource
{
    public static $wrap;

    /**
     * @var Review
     */
    public $resource;

    public const TYPE = 'review';

    public function toArray($request): array
    {
        $resource = $this->resource;

        return array_merge(self::getIdentifiers($resource),  [
            'attributes' => $this->getMappedAttributes(),
        ]);
    }

    public static function getIdentifiers(Review $resource): array
    {
        return [
            'type' => self::TYPE,
            'id' => (string) $resource->id,
        ];
    }

    protected function getMappedAttributes(): array
    {
        return [
            'created_at' => $this->resource->created_at,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'rating' => (int) $this->resource->rating,
        ];
    }
}
