<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Models\Terrain;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Terrain\TerrainResource;
use Orion\Travelr\Resources\Terrain\TerrainResourceCollection;

class TerrainApiController extends Controller
{
    public function index(): JsonResource
    {
        return new TerrainResourceCollection(Terrain::all());
    }

    public function show(int $terrainId): JsonResource
    {
        return new TerrainResource(Terrain::findOrFail($terrainId));
    }
}
