<?php

namespace Orion\Travelr\Tests\Unit\Repositories;

use Orion\Travelr\Entities\PlanetEntity;
use Orion\Travelr\Planet;
use Orion\Travelr\Repositories\PlanetInterface;
use Orion\Travelr\Terrain;
use Orion\Travelr\Tests\TestCase;

class PlanetRepositoryTest extends TestCase
{
    /**
     * @var PlanetInterface
     */
    private $repo;

    public function setUp()
    {
        parent::setUp();

        $this->repo = app(PlanetInterface::class);
    }

    public function testGetByIdReturnsEntity(): void
    {
        $planet = factory(Planet::class)->create();
        $planet->terrains()->sync(factory(Terrain::class)->create()->id);
        $result = $this->repo->getById($planet->id);

        $this->assertInstanceOf(PlanetEntity::class, $result);
    }
}
