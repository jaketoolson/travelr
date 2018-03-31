<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Models\PlanetSearchCriteria;
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

    public function filter(Request $request): JsonResource
    {
        $searchCriteria = new PlanetSearchCriteria($request->get('galaxy_id'), $request->get('planet_name'));
        $results = $this->planetRepository->search($searchCriteria);

        return PlanetTransformer::collection($results);
    }
}
