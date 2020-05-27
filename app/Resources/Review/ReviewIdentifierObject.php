<?php
/**
 * Copyright (c) 2020. Jake Toolson
 */

namespace Orion\Travelr\Resources\Review;

use Illuminate\Http\Resources\Json\Resource;

class ReviewIdentifierObject extends Resource
{
    public function toArray($request): array
    {
        return ReviewResource::getIdentifiers($this->resource);
    }
}
