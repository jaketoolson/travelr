<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

class FiltersParameter
{
    private $filters = [];

    public function add(string $key, string $filter): void
    {
        $this->filters[$key] = $filter;
    }

    public function get(): array
    {
        return $this->filters;
    }

    public function getAttributes(): array
    {
        return array_keys($this->filters);
    }

    public function getForAttribute(string $resourceType): ?string
    {
        return $this->filters[$resourceType] ?? null;
    }
}
