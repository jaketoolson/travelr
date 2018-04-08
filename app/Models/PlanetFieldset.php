<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;

class PlanetFieldset implements CriteriaInterface
{
    private $fieldsets = [];

    public function __construct(array $fieldsets)
    {
        $this->fieldsets = $fieldsets;
    }

    public function requiredFields(): array
    {
        return [
            'id',
        ];
    }

    public function defaultFields(): array
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
        $fieldsets = $this->fieldsets;

        if (! $fieldsets) {
            foreach ($this->defaultFields() as $fieldName) {
                $builder->addSelect($fieldName);
            }
        } else {
            // Todo, this should be required.
            foreach ($fieldsets as $fieldName) {
                if (in_array($fieldName, $this->defaultFields(), true)) {
                    $builder->addSelect($fieldName);
                }
            }
        }

        foreach ($this->requiredFields() as $fieldName) {
            $builder->addSelect($fieldName);
        }

        return $builder;
    }
}
