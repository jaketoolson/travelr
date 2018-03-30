<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property string description
 * @property bool is_active
 */
class Facility extends BaseEloquentModel
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
