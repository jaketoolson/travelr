<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Resources;

trait ResourceParameterMappers
{
    public function getFilteredAttributes(array $mappedAttributes, array $filteredAttributeNames = null): array
    {
        if (! $filteredAttributeNames) {
            return $mappedAttributes;
        }

        $returnedAttributes = [];
        foreach ($filteredAttributeNames as $attribute) {
            if (! array_key_exists($attribute, $mappedAttributes)) {
                continue;
            }

            $returnedAttributes[$attribute] = $mappedAttributes[$attribute];
        }

        return $returnedAttributes;
    }
}