<?php

namespace Orion\Travelr;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
 * @property Collection terrains
 * @property Galaxy galaxy
 */
class Planet extends BaseModel
{
    use HasUuid;

    protected $table = 'planets';

    protected $with = [
        'galaxy',
        'terrains'
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
    ];

    public function transformToEntity()
    {
        $entity = new PlanetEntity(
            $this->id,
            $this->uuid,
            $this->galaxy->transformToEntity(),
            $this->name,
            $this->description,
            $this->diameter,
            $this->climate,
            $this->rotation_period_hours,
            $this->population
        );

        if ($terrains = $this->terrains) {
            /** @var Terrain $terrain */
            foreach ($terrains as $terrain) {
                $entity->addTerrain($terrain->transformToEntity());
            }
        }

        return $entity;
    }

    public function galaxy(): BelongsTo
    {
        return $this->belongsTo(Galaxy::class, 'galaxy_id');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'facility_planet', 'planet_id', 'facility_id');
    }

    public function terrains(): BelongsToMany
    {
        return $this->belongsToMany(Terrain::class, 'terrain_planet', 'planet_id', 'terrain_id');
    }
}
