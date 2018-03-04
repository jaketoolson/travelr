<?php

namespace Orion\Travelr;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orion\Travelr\Entities\TerrainEntity;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property null|string description
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
        return new TerrainEntity(
            $this->id,
            $this->uuid,
            $this->name
        );
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, 'terrain_planet', 'terrain_id', 'planet_id');
    }
}
