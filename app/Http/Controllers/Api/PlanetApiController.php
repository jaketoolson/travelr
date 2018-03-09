<?php

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;

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

    public function show(int $planetId): JsonResponse
    {
        $data = $this->planetRepository->getById($planetId);

        return $this->jsonResponse($data);
    }
}
