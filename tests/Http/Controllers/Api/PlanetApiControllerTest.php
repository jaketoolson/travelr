<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\MockInterface;
use Orion\Travelr\Models\File;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Tests\TestCase;

class PlanetApiControllerTest extends TestCase
{
    /**
     * @var PlanetRepository|MockInterface
     */
    private $planetRepositoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->planetRepositoryMock = $this->mockAndBind(PlanetRepository::class);
    }

    // TODO: Add with(schema)
    // TODO: Validate JSON response
    // TODO: Validate query schema
    public function testIndexMethodReturnsExpectedData(): void
    {
        $repo = $this->planetRepositoryMock;

        $planets = $this->createPlanets([], 4);

        $repo->shouldReceive('query')
            ->once()
            ->andReturn($collection = new Collection($planets));

        $response = $this->get(route('api.planets.index'));

        $response->assertStatus(200);
    }

    public function testShowMethodThrowsExceptionWithInvalidId(): void
    {
        $repo = $this->planetRepositoryMock;

        $repo->shouldReceive('getById')
            ->with(999)
            ->once()
            ->andThrows(ModelNotFoundException::class);

        $response = $this->get(route('api.planets.show', [999]));

        $response->assertStatus(404);
    }

    // TODO: Validate JSON response
    public function testShowMethodReturnsExpectedData(): void
    {
        $repo = $this->planetRepositoryMock;

        $planet = $this->createPlanet();

        $repo->shouldReceive('getById')
            ->with($planet->id)
            ->once()
            ->andReturn($planet);

        $response = $this->get(route('api.planets.show', [$planet->id]));

        $response->assertStatus(201);
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args)->each(function (Planet $p) {
            $p->photo()->save(factory(File::class)->make());
        });
    }

    private function createPlanet(array $args = []): Planet
    {
        return $this->createPlanets($args, 1)->first();
    }
}
