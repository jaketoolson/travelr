<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Orion\Travelr\Entities\GalaxyEntity;

/**
 * @property int id
 * @property string uuid
 * @property string name
 */
class Galaxy extends BaseModel
{
    use HasUuid;

    protected $table = 'galaxies';

    protected $fillable = [
        'uuid',
        'name',
    ];

    public function transformModelToEntity()
    {
        return new GalaxyEntity(
            $this->id,
            $this->uuid,
            $this->name
        );
    }

    public function planets(): HasMany
    {
        return $this->hasMany(Planet::class, 'galaxy_id');
    }
}
