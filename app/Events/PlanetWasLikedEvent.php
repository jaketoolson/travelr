<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Events;

class PlanetWasLikedEvent
{
    private $planetId;
    private $userId;

    public function __construct(int $planetId, int $userId)
    {
        $this->planetId = $planetId;
        $this->userId = $userId;
    }

    public function getPlanetId(): int
    {
        return $this->planetId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
