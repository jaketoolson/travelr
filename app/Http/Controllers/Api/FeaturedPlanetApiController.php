<?php

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Transformers\PlanetTransformer;

class FeaturedPlanetApiController extends Controller
{
    /**
     * @var PlanetRepository
     */
    private $planetRepository;

    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    public function index(int $limit = 4): JsonResponse
    {
        $planets = $this->planetRepository->getFeatured($limit);

        return $this->jsonResponse(PlanetTransformer::transformToArray($planets));
    }
}
