<?php

namespace Orion\Travelr\Entities;

final class TerrainEntity
{
    private $id;
    private $uuid;
    private $name;

    public function __construct(int $id, string $uuid, string $name)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
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
}
