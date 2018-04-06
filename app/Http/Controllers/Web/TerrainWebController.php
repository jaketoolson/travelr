<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Web;

use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Models\Terrain;
use Orion\Travelr\Resources\PlanetTerrainsRelationshipResource;

class TerrainWebController extends Controller
{
    public function show(int $terrainId)
    {
        $terrain = Terrain::findOrFail($terrainId);

        return new PlanetTerrainsRelationshipResource($terrain);
    }
}
