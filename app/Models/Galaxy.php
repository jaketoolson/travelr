<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property int id
 * @property string uuid
 * @property string name
 *
 * @property Collection|Planet[] planets
 */
class Galaxy extends BaseEloquentModel
{
    use HasUuid;

    protected $table = 'galaxies';

    protected $fillable = [
        'uuid',
        'name',
    ];

    public function planets(): HasMany
    {
        return $this->hasMany(Planet::class, 'galaxy_id');
    }
}
