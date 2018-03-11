<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orion\Travelr\Entities\TerrainEntity;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property null|string description
 *
 * @property Collection|Planet[] planets
 */
class Terrain extends BaseModel
{
    use HasUuid;

    protected $table = 'terrains';

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function transformModelToEntity()
    {
        $terrain = new TerrainEntity(
            $this->id,
            $this->uuid,
            $this->name
        );

        if ($planets = $this->planets) {
            foreach ($planets as $planet) {
                $terrain->addPlanet($planet->transformModelToEntity());
            }
        }

        return $terrain;
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, 'terrain_planet', 'terrain_id', 'planet_id');
    }
}
