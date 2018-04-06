<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests\Feature\Http\Api;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\MockInterface;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Tests\TestCase;
use Orion\Travelr\Resources\PlanetResource;

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

    public function testIndexMethodReturnsExpectedData(): void
    {
        $repo = $this->planetRepositoryMock;

        $planets = $this->createPlanets([], 4);

        $repo->shouldReceive('getAll')
            ->once()
            ->andReturn($collection = new Collection($planets));

        $response = $this->get(route('api.planet.index'));
        $expectedJson = PlanetResource::collection($collection);

        $response->assertStatus(200);
        $this->assertJsonResponseEqualsArray($response, ['data' => $expectedJson->jsonSerialize()]);
    }

    public function testShowMethodThrowsExceptionWithInvalidId(): void
    {
        $repo = $this->planetRepositoryMock;

        $repo->shouldReceive('getById')
            ->with(999)
            ->once()
            ->andThrows(ModelNotFoundException::class);

        $response = $this->get(route('api.planet.show', [999]));

        $response->assertStatus(404);
    }

    public function testShowMethodReturnsExpectedData(): void
    {
        $repo = $this->planetRepositoryMock;

        $planet = $this->createPlanet();

        $repo->shouldReceive('getById')
            ->with($planet->id)
            ->once()
            ->andReturn($planet);

        $response = $this->get(route('api.planet.show', [$planet->id]));
        $expectedJson = new PlanetResource($planet);

        $response->assertStatus(201);
        $this->assertJsonResponseEqualsArray($response, ['data' => $expectedJson->jsonSerialize()]);
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
