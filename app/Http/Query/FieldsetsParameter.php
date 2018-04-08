<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

class FieldsetsParameter
{
    private $fieldsets = [];

    public function add(string $resourceType, string $fieldName): void
    {
        $this->fieldsets[$resourceType][] = $fieldName;
    }

    public function get(): array
    {
        return $this->fieldsets;
    }

    public function getResourceTypes(): array
    {
        return array_keys($this->fieldsets);
    }

    public function getForResourceType(string $resourceType): ?array
    {
        return $this->fieldsets[$resourceType] ?? null;
    }
}
