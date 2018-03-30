<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests\Unit\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
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
        $expectedCount = 5;
        $this->createPlanets([], $expectedCount);

        $result = $this->repo->getAll();

        $this->assertEquals($expectedCount, $result->count());
    }

    public function testGetByIdReturnsPlanet(): void
    {
        $planet = $this->createPlanets()->first();

        $result = $this->repo->getById($planet->id);

        $this->assertInstanceOf(Planet::class, $result);
    }

    public function testGetFeaturedReturnsCollection(): void
    {
        $expectedCount = 8;
        $this->createPlanets(['featured' => Carbon::now()], $expectedCount);

        $result = $this->repo->getFeatured($expectedCount);

        $this->assertEquals($expectedCount, $result->count());
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args);
    }
}
