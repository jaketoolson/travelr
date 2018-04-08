<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetSearchCriteria;
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
        $expectedCount = 4;
        $this->createPlanets(['featured' => Carbon::now()], $expectedCount);

        $result = $this->repo->getFeatured($expectedCount);
        $this->assertEquals($expectedCount, $result->count());

        $result = $this->repo->getFeatured();
        $this->assertEquals(4, $result->count());
    }

    public function testFilterWithNullReturnsEmpty(): void
    {
        $searchCriteria = new PlanetSearchCriteria;
        $result = $this->repo->search($searchCriteria);

        $this->assertSame(0, $result->count());
    }

    public function testFilterWithNullReturnsResults(): void
    {
        $planetA = $this->createPlanets(['name' => 'foo'], 1);
        $planetB = $this->createPlanets(['name' => 'bar'], 1)->merge($planetA);
        $this->createPlanets(['name' => 'foobar'], 1)->merge($planetB);

        $searchCriteria = new PlanetSearchCriteria;
        $searchCriteria->setPlanetName('fo');

        $result = $this->repo->search($searchCriteria);

        $this->assertSame(2, $result->count());
        $this->assertInstanceOf(Planet::class, $result->first());
        $this->assertFalse($result->containsStrict('name', 'bar'));
        $this->assertTrue($result->containsStrict('name', 'foo'));
        $this->assertTrue($result->containsStrict('name', 'foobar'));
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args);
    }
}
