<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\PlanetResource;

class PlanetWebController extends Controller
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
        $planets = $this->planetRepository->getAll();

        return PlanetResource::collection($planets);
    }

    public function show(int $planetId): JsonResource
    {
        $planet = $this->planetRepository->getById($planetId);

        return new PlanetResource($planet);
    }
}
