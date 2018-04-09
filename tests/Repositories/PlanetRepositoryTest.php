<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Tests\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Orion\Travelr\Models\Planet;
use Orion\Travelr\Models\PlanetQuery\PlanetFieldset;
use Orion\Travelr\Models\PlanetQuery\PlanetFilter;
use Orion\Travelr\Models\PlanetQuery\PlanetQuerySchema;
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

    public function testQueryFilter(): void
    {
        $this->createPlanets([
            'name' => str_random(6)
        ]);

        $schema = $this->createPlanetQuerySchema(['name' => 'foo_bar_baz']);

        $result = $this->repo->query($schema);
        $this->assertEquals(0, $result->count());
    }

    public function testQueryFieldset(): void
    {
        $this->createPlanets([], 2);

        $schema = $this->createPlanetQuerySchema([], ['name', 'foo', 'bar']);

        $results = $this->repo->query($schema);

        $this->assertEquals(2, $results->count());

        foreach ($results as $result) {
            $attributes = $result->getAttributes();

            $this->assertTrue(array_key_exists('name', $attributes));
            $this->assertFalse(array_key_exists('foo', $attributes));
            $this->assertFalse(array_key_exists('bar', $attributes));
        }
    }

    public function testQueryAll(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $name = $i === 1 ? str_random(4) : 'foo' . str_random(4);
            $this->createPlanets([
                'name' => $name
            ], 1);
        }

        $schema = $this->createPlanetQuerySchema(['name' => 'foo'], ['name', 'foo', 'bar']);

        $results = $this->repo->query($schema);

        $this->assertEquals(2, $results->count());
    }

    private function createPlanets(array $args = [], int $amount = 1): Collection
    {
        return factory(Planet::class)->times($amount)->create($args);
    }

    private function createPlanetQuerySchema(array $filters = [], array $fields = []): PlanetQuerySchema
    {
        return new PlanetQuerySchema(
            new PlanetFilter($filters),
            new PlanetFieldset($fields)
        );
    }
}
