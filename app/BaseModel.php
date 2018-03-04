<?php

namespace Orion\Travelr;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    abstract public function transformToEntity();
}
