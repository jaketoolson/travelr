<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Entities;

class GalaxyEntity extends BaseEntity
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

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'uuid' => $this->getUuid(),
            'name' => $this->getName(),
        ];
    }
}
