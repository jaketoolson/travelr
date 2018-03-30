<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseHttpResource extends JsonResource
{
    public function getResource()
    {
        return $this->resource;
    }
}
