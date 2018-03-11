<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

trait HasUuid
{
    public static function bootHasUuid()
    {
        self::creating(function($model){
           $model->uuid = sha1($model->name ?? str_random(16));
        });
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
