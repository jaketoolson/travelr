<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

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
}
