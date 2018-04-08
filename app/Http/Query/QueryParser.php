<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

class QueryParser
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

    public function getFields(): FieldsetsParameter
    {
        return $this->parseFieldSets($this->getParameters());
    }

    public function getFilters(): FiltersParameter
    {
        return $this->parseFilters($this->getParameters());
    }
}
