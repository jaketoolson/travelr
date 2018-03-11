<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Entities;

use Illuminate\Support\Collection;

class PlanetEntity extends BaseEntity
{
    private $id;
    private $uuid;
    private $galaxy;
    private $name;
    private $description;
    private $diameter;
    private $climate;
    private $rotationPeriodHours;
    private $population;
    private $terrains;

    public function __construct(
        int $id,
        string $uuid,
        GalaxyEntity $galaxy,
        string $name,
        string $description,
        int $diameter = null,
        string $climate = '',
        int $rotationPeriodHours,
        int $population
    ) {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->galaxy = $galaxy;
        $this->name = $name;
        $this->description = $description;
        $this->diameter = $diameter;
        $this->climate = $climate;
        $this->rotationPeriodHours = $rotationPeriodHours;
        $this->population = $population;

        $this->terrains = new Collection();
    }

    public function addTerrain(TerrainEntity $terrain): void
    {
        if (!$this->terrains->contains($terrain)) {
            $terrain->addPlanet($this);
            $this->terrains->push($terrain);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getGalaxy(): GalaxyEntity
    {
        return $this->galaxy;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function getClimate(): string
    {
        return $this->climate;
    }

    public function getRotationPeriodHours(): int
    {
        return $this->rotationPeriodHours;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function getTerrains(): Collection
    {
        return $this->terrains;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'uuid' => $this->getUuid(),
            'galaxy' => $this->getGalaxy()->toArray(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'diameter' => $this->getDiameter(),
            'climate' => $this->getClimate(),
            'rotation_period_hours' => $this->getRotationPeriodHours(),
            'population' => $this->getPopulation(),
            'terrains' => $this->getTerrains()->toArray(),
        ];
    }
}
