<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property null|string description
 *
 * @property Collection|Planet[] planets
 */
class Terrain extends BaseEloquentModel
{
    use HasUuid;

    protected $table = 'terrains';

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, 'terrain_planet', 'terrain_id', 'planet_id');
    }
}
