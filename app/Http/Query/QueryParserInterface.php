<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

interface QueryParserInterface
{
    public function getFields(): array;

    public function getFilters(): array;
}
