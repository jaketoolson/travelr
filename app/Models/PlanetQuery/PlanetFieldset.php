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
    public function requiredAttributes(): array
    {
        return [
            'id',
        ];
    }

    public function defaultAttributes(): array
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
        ];
    }

    public function apply(Builder $builder): Builder
    {
        $fieldsets = $this->getFieldsets();

        if (! $fieldsets) {
            foreach ($this->defaultAttributes() as $fieldName) {
                $builder->addSelect($fieldName);
            }
        } else {
            foreach ($fieldsets as $fieldName) {
                if (in_array($fieldName, $this->defaultAttributes(), true)) {
                    $builder->addSelect($fieldName);
                }
            }
        }

        foreach ($this->requiredAttributes() as $fieldName) {
            $builder->addSelect($fieldName);
        }

        return $builder;
    }
}
