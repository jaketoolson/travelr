<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Builder;
use Orion\Travelr\Models\Query\QuerySchemaInterface;

class BaseEloquentBuilder extends Builder
{
    /**
     * @var array|CriteriaInterface[]
     */
    protected $criteria = [];

    public function applyCriteria(CriteriaInterface $criteria): Builder
    {
        $this->criteria[] = $criteria;
        $criteria->apply($this);

        return $this;
    }

    public function getCriteria(): array
    {
        return $this->criteria;
    }

    public function applyQuerySchemas(QuerySchemaInterface $querySchema): BaseEloquentBuilder
    {
        // Apply fieldset to query
        $this->applyCriteria($querySchema->getFieldset());

        // Apply filters to query
        $this->applyCriteria($querySchema->getFilter());

        return $this;
    }
}