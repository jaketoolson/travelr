<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

/**
 * @property int id
 * @property int user_id
 * @property int likable_id
 * @property string likable_type
 */
class Like extends BaseEloquentModel
{
    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'likable_id',
        'likable_type',
    ];
}
