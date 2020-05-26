<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int id
 * @property int galaxy_id
 * @property string uuid
 * @property string name
 * @property string description
 * @property null|int diameter
 * @property string climate
 * @property int rotation_period_hours
 * @property null|int population
 * @property int price_cents
 * @property float price_dollars
 * @property Carbon|null featured
 * @property null|float average_rating
 * @property int total_reviews
 *
 * @property File photo
 * @property Galaxy galaxy
 * @property Collection|Amenity[] amenities
 * @property Collection|Terrain[] terrains
 * @property Collection|Review[] reviews
 * @property Collection|Like[] likes
 *
 * @method Builder featured()
 * @method Builder notFeatured()
 */
class Planet extends BaseEloquentModel
{
    use HasUuid, SoftDeletes;

    protected $table = 'planets';

    protected $appends = [
        'price_dollars',
        'average_rating',
        'total_reviews',
        'total_likes',
    ];

    protected $with = [
        'galaxy',
        'terrains',
        'photo',
        'amenities'
    ];

    protected $fillable = [
        'galaxy_id',
        'uuid',
        'name',
        'description',
        'diameter',
        'climate',
        'rotation_period_hours',
        'population',
        'price_cents',
        'photo',
        'featured',
        'price_dollars',
    ];

    protected $casts = [
        'featured' => 'bool',
    ];

    protected $excludeFromMappings = [
        'id',
        'galaxy_id',
    ];

    public function getPriceDollarsAttribute(): float
    {
        return round($this->price_cents/100, 2);
    }

    public function getAverageRatingAttribute(): ?float
    {
        return $this->reviews()->selectRaw('ROUND(AVG(rating), 1) as rating')->first()->rating;
    }

    public function getTotalReviewsAttribute(): ?int
    {
        return $this->reviews->count();
    }

    public function getTotalLikesAttribute(): ?int
    {
        return $this->likes->count();
    }

    public function scopeFeatured(Builder $builder): Builder
    {
        return $builder->whereNotNull('featured');
    }

    public function scopeNotFeatured(Builder $builder): Builder
    {
        return $builder->whereNull('featured');
    }

    public function photo(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'amenity_planet', 'planet_id', 'amenity_id');
    }

    public function galaxy(): BelongsTo
    {
        return $this->belongsTo(Galaxy::class, 'galaxy_id');
    }

    public function terrains(): BelongsToMany
    {
        return $this->belongsToMany(Terrain::class, 'terrain_planet', 'planet_id', 'terrain_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'planet_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'likable_id')->where('likable_type', '=', get_class($this));
    }

    public function like(int $userId): Planet
    {
        // TODO: Factory
        Like::firstOrCreate([
            'user_id' => $userId,
            'likable_id' => $this->id,
            'likable_type' => get_class($this)
        ]);

        return $this;
    }
}
