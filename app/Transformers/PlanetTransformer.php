<?php

namespace Orion\Travelr\Transformers;

use Orion\Travelr\BaseModel;

class PlanetTransformer extends BaseTransformer
{
    public function toArray(BaseModel $planet): array
    {
        return [
            'id' => $planet->id,
            'uuid' => $planet->uuid,
            'galaxy' => $planet->galaxy->toArray(),
            'name' => $planet->name,
            'description' => $planet->description,
            'diameter' => $planet->diameter,
            'climate' => $planet->climate,
            'rotation_period_hours' => $planet->rotation_period_hours,
            'population' => $planet->population,
            'terrains' => $planet->terrains->toArray(),
        ];
    }
}
