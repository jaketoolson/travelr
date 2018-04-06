<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Web;

use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Repositories\GalaxyRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\GalaxyTransformer;

class GalaxyWebController extends Controller
{
    /**
     * @var GalaxyRepository
     */
    private $galaxyRepository;

    public function __construct(GalaxyRepository $galaxyRepository)
    {
        $this->galaxyRepository = $galaxyRepository;
    }

    public function index(): JsonResource
    {
        $galaxies = $this->galaxyRepository->getAll();

        return GalaxyTransformer::collection($galaxies);
    }

    public function show(int $planetId)
    {
        $galaxy = $this->galaxyRepository->getById($planetId);

        return new GalaxyTransformer($galaxy);
    }
}
