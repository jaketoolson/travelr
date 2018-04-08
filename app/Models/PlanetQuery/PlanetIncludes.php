<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\PlanetQuery;

use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Models\CriteriaInterface;

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
