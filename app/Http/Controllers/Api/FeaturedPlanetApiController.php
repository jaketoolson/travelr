<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Planet\PlanetFeaturedResourceCollection;

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

    public function index(Request $request)
    {
        $planets = $this->planetRepository->getFeatured($request->get('limit', 4));

        return new PlanetFeaturedResourceCollection($planets);
    }
}
