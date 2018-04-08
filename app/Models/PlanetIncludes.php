<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;

class PlanetIncludes implements CriteriaInterface
{
    private $fieldsets = [];

    public function __construct(array $fieldsets)
    {
        $this->fieldsets = $fieldsets;
    }

    public function defaultIncludes(): array
    {
        return [
            'photo',
        ];
    }

    public function apply(Builder $builder): Builder
    {
        $fieldsets = $this->fieldsets;

        foreach ($fieldsets as $fieldName) {
            $builder->addSelect($fieldName);
        }

        return $builder;
    }
}
