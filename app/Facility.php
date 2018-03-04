<?php

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
}
