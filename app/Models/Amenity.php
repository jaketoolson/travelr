<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

/**
 * @property int id
 * @property string uuid
 * @property string name
 * @property string slug
 * @property string description
 * @property bool is_active
 */
class Amenity extends BaseEloquentModel
{
    use HasUuid;

    protected $table = 'amenities';

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',
        'is_active',
    ];
}
