<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

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

    public function index()
    {
        $planets = $this->planetRepository->getAll();

        return PlanetTransformer::collection($planets);
    }

    public function show(int $planetId)
    {
        $planet = $this->planetRepository->getById($planetId);

        return new PlanetTransformer($planet);
    }
}
