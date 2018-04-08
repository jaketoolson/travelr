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

    public function applyCriteria(CriteriaInterface $criteria): BaseEloquentBuilder
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
        $this->applyCriteria($querySchema->getFieldset())
            ->applyCriteria($querySchema->getFilter());

        return $this;
    }
}