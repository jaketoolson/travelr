<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Tests\Feature\Http\Api;

use Illuminate\Database\Eloquent\Collection;
use Mockery\MockInterface;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetSearchCriteria;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Tests\TestCase;

class SearchPlanetApiControllerTest extends TestCase
{
    /**
     * @var PlanetRepository|MockInterface
     */
    private $planetRepositoryMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->planetRepositoryMock = $this->mockAndBind(PlanetRepository::class);
    }

    public function testIndexMethodReturnsExpectedData(): void
    {
        $repo = $this->planetRepositoryMock;

        $planets = $this->createPlanets([], 4);

        $repo->shouldReceive('search')
            ->once()
            ->with($search = new PlanetSearchCriteria())
            ->andReturn($planets);

        $response = $this->get(route('api.planet.filter', ['galaxy_id' => '123']));
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args);
    }

    private function createPlanet(array $args = []): Planet
    {
        return $this->createPlanets($args, 1)->first();
    }
}
