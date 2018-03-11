<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property string description
 * @property bool is_active
 */
class Facility extends BaseModel
{
    use HasUuid;

    protected $table = 'facilities';

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'is_active',
    ];

    public function transformModelToEntity()
    {

    }
}
