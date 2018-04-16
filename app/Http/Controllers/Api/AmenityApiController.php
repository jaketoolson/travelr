<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Models\Amenity;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Amenity\AmenityResource;
use Orion\Travelr\Resources\Amenity\AmenityResourceCollection;

class AmenityApiController extends Controller
{
    public function index(): JsonResource
    {
        return new AmenityResourceCollection(Amenity::orderBy('name')->get());
    }

    public function show(int $amenityId): JsonResource
    {
        return new AmenityResource(Amenity::findOrFail($amenityId));
    }
}
