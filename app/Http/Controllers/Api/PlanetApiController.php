<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Orion\Travelr\Http\Query\QueryParser;
use Orion\Travelr\Models\PlanetQuery\PlanetFieldset;
use Orion\Travelr\Models\PlanetQuery\PlanetFilter;
use Orion\Travelr\Models\PlanetQuery\PlanetQuerySchema;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Resources\Planet\PlanetResource;
use Orion\Travelr\Resources\Planet\PlanetResourceCollection;

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

    /**
     * @param Request $request
     * @return JsonResource
     */
    public function index(Request $request): JsonResource
    {
        // FIXME: This is a bit confusing but still heading in the right direction.
        $query = new QueryParser($request->all());

        $schema = new PlanetQuerySchema(
            new PlanetFilter($query->getFilters()),
            new PlanetFieldset($query->getFieldsetsByResourceType(PlanetQuerySchema::RESOURCE_TYPE))
        );

        return new PlanetResourceCollection($this->planetRepository->query($schema));
    }

    public function show(int $planetId): JsonResource
    {
        return new PlanetResource($this->planetRepository->getById($planetId));
    }
}
