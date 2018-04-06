<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Models\Terrain;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Repositories\TerrainRepository;
use Orion\Travelr\Resources\Terrain\TerrainResource;
use Orion\Travelr\Resources\Terrain\TerrainResourceCollection;

class TerrainApiController extends Controller
{
    /**
     * @var TerrainRepository
     */
    private $terrainRepository;

    public function __construct(TerrainRepository $terrainRepository)
    {
        $this->terrainRepository = $terrainRepository;
    }

    public function index(): JsonResource
    {
        return new TerrainResourceCollection($this->terrainRepository->getAll());
    }

    public function show(int $terrainId): JsonResource
    {
        return new TerrainResource($this->terrainRepository->getById($terrainId));
    }
}
