<?php

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
 * @property Collection planets
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

    public function transformToEntity()
    {
        $terrain = new TerrainEntity(
            $this->id,
            $this->uuid,
            $this->name
        );

        if ($planets = $this->planets) {
            /** @var Planet $planet */
            foreach ($planets as $planet) {
                $terrain->addPlanet($planet->transformToEntity());
            }
        }

        return $terrain;
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, 'terrain_planet', 'terrain_id', 'planet_id');
    }
}
