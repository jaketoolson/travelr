<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Repositories\GalaxyRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Galaxy\GalaxyResourceCollection;
use Orion\Travelr\Resources\Galaxy\GalaxyResource;

class GalaxyApiController extends Controller
{
    /**
     * @var GalaxyRepository
     */
    private $galaxyRepository;

    public function __construct(GalaxyRepository $galaxyRepository)
    {
        $this->galaxyRepository = $galaxyRepository;
    }

    public function index(): JsonResource
    {
        return new GalaxyResourceCollection($this->galaxyRepository->getAll());
    }

    public function show(int $planetId): JsonResource
    {
        return new GalaxyResource($this->galaxyRepository->getById($planetId));
    }
}
