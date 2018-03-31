<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method BaseEloquentBuilder applyCriteria(CriteriaInterface $criteria)
 */
abstract class BaseEloquentModel extends Model
{
    public function newEloquentBuilder($query): BaseEloquentBuilder
    {
        return new BaseEloquentBuilder($query);
    }
}
