<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Planet\PlanetResource;
use Orion\Travelr\Resources\Planet\PlanetResourceCollection;

class PlanetApiController extends Controller
{
    /**
     * @var PlanetRepository
     */
    private $planetRepository;

    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    public function index(): JsonResource
    {
        return new PlanetResourceCollection($this->planetRepository->getAll());
    }

    public function show(int $planetId): JsonResource
    {
        return new PlanetResource($this->planetRepository->getById($planetId));
    }
}
