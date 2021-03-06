<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\Query;

abstract class BaseFieldset
{
    /**
     * @var array
     */
    private $fieldsets = [];

    public function __construct(array $fieldsets)
    {
        $this->fieldsets = $fieldsets;
    }

    public function getFieldsets(): array
    {
        return $this->fieldsets;
    }

    abstract public static function requiredAttributes(): array;

    abstract public static function defaultAttributes(): array;
}
