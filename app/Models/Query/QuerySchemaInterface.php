<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Models\Query;

use Orion\Travelr\Models\CriteriaInterface;

interface QuerySchemaInterface
{
    public function getFilter(): CriteriaInterface;

    public function getFieldset(): CriteriaInterface;
}