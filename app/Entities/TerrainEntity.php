<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Entities;

use Illuminate\Support\Collection;

class TerrainEntity extends BaseEntity
{
    private $id;
    private $uuid;
    private $name;
    private $planets;

    public function __construct(int $id, string $uuid, string $name)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;

        $this->planets = new Collection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addPlanet(PlanetEntity $planet): void
    {
        if (! $this->planets->contains($planet)) {
            $this->planets->push($planet);
        }
    }

    public function getPlanets(): Collection
    {
        return $this->planets;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'uuid' => $this->getUuid(),
            'name' => $this->getName(),
            'planets' => $this->getPlanets()->toArray(),
        ];
    }
}
