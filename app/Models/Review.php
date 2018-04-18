<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string uuid
 * @property int user_id
 * @property int planet_id
 * @property string title
 * @property string description
 * @property int rating
 *
 * @property User author
 * @property Planet planet
 */
class Review extends BaseEloquentModel
{
    public const MAX_RATING = 5;
    public const MIN_RATING = 1;

    use HasUuid, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'uuid',
        'user_id',
        'planet_id',
        'title',
        'description',
        'rating',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function planet(): BelongsTo
    {
        return $this->belongsTo(Planet::class, 'planet_id');
    }
}
