<?php

namespace Orion\Travelr\Tests\Feature\Http\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\MockInterface;
use Orion\Travelr\Planet;
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

    public function testShowMethodThrowsExceptionWithInvalidId(): void
    {
        $repo = $this->planetRepositoryMock;

        $repo->shouldReceive('getById')
            ->with(999)
            ->once()
            ->andThrows(ModelNotFoundException::class);

        $response = $this->get('/api/planet/999');

        $response->assertStatus(404);
    }

    public function testShowMethodReturnsExpectedResult(): void
    {
        $repo = $this->planetRepositoryMock;
        /** @var Planet $planet */
        $planet = factory(Planet::class)->create();

        $repo->shouldReceive('getById')
            ->with($planet->id)
            ->once()
            ->andReturn($this->mock($planet->transformModelToEntity()));

        $response = $this->get('/api/planet/'.$planet->id);

        $response->assertStatus(200);
    }
}
