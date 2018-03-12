<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Entities\PlanetEntity;

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
 *
 * @property File photo
 * @property Collection|Facility[] facilities
 * @property Galaxy galaxy
 * @property Collection|Terrain[] terrains
 */
class Planet extends BaseModel
{
    use HasUuid, SoftDeletes;

    protected $table = 'planets';

    protected $appends = [
        'price_dollars',
    ];

    protected $with = [
        'galaxy',
        'terrains',
        'photo'
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
        'featured'
    ];

//    public function transformModelToEntity()
//    {
//        $entity = new PlanetEntity(
//            $this->id,
//            $this->uuid,
//            $this->galaxy->transformModelToEntity(),
//            $this->name,
//            $this->description,
//            $this->diameter,
//            $this->climate,
//            $this->rotation_period_hours,
//            $this->population
//        );
//
//        if ($terrains = $this->terrains) {
//            foreach ($terrains as $terrain) {
//                $entity->addTerrain($terrain->transformModelToEntity());
//            }
//        }
//
//        return $entity;
//    }

    public function getPriceDollarsAttribute(): float
    {
        return round($this->price_cents/100, 2);
    }

    public function scopeFeatured(Builder $builder): Builder
    {
        return $builder->whereNotNull('featured');
    }

    public function photo()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_planet', 'planet_id', 'facility_id');
    }

    public function galaxy(): BelongsTo
    {
        return $this->belongsTo(Galaxy::class, 'galaxy_id');
    }

    public function terrains(): BelongsToMany
    {
        return $this->belongsToMany(Terrain::class, 'terrain_planet', 'planet_id', 'terrain_id');
    }
}
