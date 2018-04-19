<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\User;

class PlanetLikesApiController extends Controller
{
    public function store(int $planetId): JsonResponse
    {
        Planet::findOrFail($planetId)->like(User::first()->id);

        return new JsonResponse('ok');
    }
}
