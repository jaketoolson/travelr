<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Transformers\PlanetTransformer;

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

    public function index(): JsonResponse
    {
        $planets = $this->planetRepository->getAll();

        return $this->jsonResponse(PlanetTransformer::transformToArray($planets));
    }

    public function show(int $planetId): JsonResponse
    {
        $planet = $this->planetRepository->getById($planetId);

        return $this->jsonResponse(PlanetTransformer::transformToArray($planet));
    }
}
