<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\PlanetQuery;

use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Models\CriteriaInterface;
use Orion\Travelr\Models\Query\BaseFieldset;

class PlanetFieldset extends BaseFieldset implements CriteriaInterface
{
    public static function requiredAttributes(): array
    {
        return [
            'id',
        ];
    }

    public static function defaultAttributes(): array
    {
        return [
            'name',
            'description',
            'diameter',
            'climate',
            'rotation_period_hours',
            'population',
            'price_cents',
            'featured',
            'galaxy_id',
        ];
    }

    public function apply(Builder $builder): Builder
    {
        $fieldsets = $this->getFieldsets();

        if (! $fieldsets) {
            foreach (self::defaultAttributes() as $fieldName) {
                $builder->addSelect($fieldName);
            }
        } else {
            foreach ($fieldsets as $fieldName) {
                if (in_array($fieldName, self::defaultAttributes(), true)) {
                    $builder->addSelect($fieldName);
                }
            }
        }

        foreach (self::requiredAttributes() as $fieldName) {
            $builder->addSelect($fieldName);
        }

        return $builder;
    }
}
