<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Models\Review;
use Orion\Travelr\Resources\Planet\PlanetReviewsResource;

class PlanetReviewsApiController extends Controller
{
    public function show(int $planetId): JsonResource
    {
        return new PlanetReviewsResource(Review::where('planet_id', '=', $planetId)->orderByDesc('created_at')->paginate(5));
    }
}
