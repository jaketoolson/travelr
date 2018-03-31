<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class BaseEloquentBuilder extends Builder
{
    /**
     * @var array|CriteriaInterface[]
     */
    protected $criteria = [];

    public function applyCriteria(Collection $criteria): Builder
    {
        $criteria->each(function (CriteriaInterface $criterion) {
            $this->criteria[] = $criterion;
            $criterion->apply($this);
        });

        return $this;
    }

    public function getCriteria(): array
    {
        return $this->criteria;
    }
}