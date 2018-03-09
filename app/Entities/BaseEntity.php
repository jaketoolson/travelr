<?php

namespace Orion\Travelr\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

abstract class BaseEntity implements Arrayable, Jsonable
{
    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }
}
