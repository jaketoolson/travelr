<?php

namespace Orion\Travelr\Tests\Unit\Repositories;

use Orion\Travelr\Entities\PlanetEntity;
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

    public function testGetByIdReturnsEntity(): void
    {
        $planet = factory(Planet::class)->create();

        $result = $this->repo->getById($planet->id);

        $this->assertInstanceOf(PlanetEntity::class, $result);
    }
}
