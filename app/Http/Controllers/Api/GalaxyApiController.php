<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Repositories\GalaxyRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Transformers\GalaxyTransformer;

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

    public function index(): JsonResponse
    {
        $galaxies = $this->galaxyRepository->getAll();

        return $this->jsonResponse(GalaxyTransformer::transformToArray($galaxies));
    }

    public function show(int $planetId): JsonResponse
    {
        $galaxy = $this->galaxyRepository->getById($planetId);

        return $this->jsonResponse(GalaxyTransformer::transformToArray($galaxy));
    }
}
