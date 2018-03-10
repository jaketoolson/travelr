<?php

namespace Orion\Travelr\Tests\Unit\Repositories;

use Illuminate\Support\Collection;
use Orion\Travelr\Planet;
use Orion\Travelr\Repositories\PlanetRepository;
use Orion\Travelr\Tests\TestCase;

class PlanetRepositoryTest extends TestCase
{
    /**
     * @var PlanetRepository
     */
    private $repo;

    public function setUp()
    {
        parent::setUp();

        $this->repo = app(PlanetRepository::class);
    }

    public function testGetAllReturnsCollection(): void
    {
        $planets = $this->createPlanets([], 5);

        $result = $this->repo->getAll();

        $this->assertEquals($planets->count(), $result->count());
    }

    public function testGetByIdReturnsPlanet(): void
    {
        $planet = $this->createPlanets()->first();

        $result = $this->repo->getById($planet->id);

        $this->assertInstanceOf(Planet::class, $result);
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args);
    }
}
