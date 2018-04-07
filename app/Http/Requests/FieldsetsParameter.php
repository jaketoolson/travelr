<?php

namespace Orion\Travelr\Http\Requests;

class FieldsetsParameter
{
    private $fieldsets = [];

    public function addFieldset(string $resourceType, string $fieldName): void
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
}
