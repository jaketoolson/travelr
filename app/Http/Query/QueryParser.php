<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

class QueryParser implements QueryParserInterface
{
    use QueryParserTrait;

    /**
     * @var array|null
     */
    private $parameters;

    public function __construct(array $parameters = null)
    {
        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getFields(): array
    {
        return $this->parseFieldSets($this->getParameters())->get();
    }

    public function getFieldsetsByResourceType(string $resourceType): array
    {
        return $this->parseFieldSets($this->getParameters())->getForResourceType($resourceType);
    }

    public function getFilters(): array
    {
        return $this->parseFilters($this->getParameters())->get();
    }
}
