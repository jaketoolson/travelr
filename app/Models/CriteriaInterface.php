<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Query\Builder;

interface CriteriaInterface
{
    public function apply(Builder $query): Builder;
}
