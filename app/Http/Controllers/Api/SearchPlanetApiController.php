<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Http\Controllers\Requests\SearchPlanetRequest;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Transformers\PlanetTransformer;

class SearchPlanetApiController extends Controller
{
    /**
     * @var PlanetRepository
     */
    private $planetRepository;

    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    public function filter(SearchPlanetRequest $request): JsonResponse
    {
        $results = $this->planetRepository->search(
            $request->get('name'),
            $request->get('galaxy_id')
        );

        return $this->jsonResponse(PlanetTransformer::transformToArray($results));
    }
}
