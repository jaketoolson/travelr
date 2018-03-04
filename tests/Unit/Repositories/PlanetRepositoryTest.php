<?php

namespace Orion\Travelr\Tests\Unit\Repositories;

use Orion\Travelr\Entities\PlanetEntity;
use Orion\Travelr\Planet;
use Orion\Travelr\Repositories\PlanetInterface;
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
        $actual = factory(Planet::class)->create();
        $result = $this->repo->getById($actual->id);

        $this->assertInstanceOf(PlanetEntity::class, $result);
    }
}
