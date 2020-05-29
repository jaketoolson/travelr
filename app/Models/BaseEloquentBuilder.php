<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Orion\Travelr\Models\Query\QuerySchemaInterface;

class BaseEloquentBuilder extends Builder
{
    /**
     * Create a new length-aware paginator instance.
     *
     * @param  \Illuminate\Support\Collection  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int  $currentPage
     * @param  array  $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginator($items, $total, $perPage, $currentPage, $options): LengthAwarePaginator
    {
        return Container::getInstance()->makeWith(Paginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }

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
