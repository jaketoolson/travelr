<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Query;

trait QueryParserTrait
{
    protected function parseFilters(array $parameters = null): FiltersParameter
    {
        $filtersParameter = new FiltersParameter;

        if (array_key_exists('filter', $parameters)) {
            $filters = (array) $parameters['filter'];
            $filters = array_filter(array_map('trim', $filters));

            foreach ($filters as $resourceType => $filter) {
                if (is_numeric($resourceType)) {
                    continue;
                }

                $filtersParameter->add($resourceType, $filter);
            }
        }

        return $filtersParameter;
    }

    /**
     * Retrieves an array of the query parameter fieldsets.
     * e.g. &fields[user]=name,password&fields[posts]=name,description
     *
     * @param array|null $parameters
     * @return FieldsetsParameter
     */
    protected function parseFieldSets(array $parameters = null): FieldsetsParameter
    {
        $fieldsetParameter = new FieldsetsParameter;

        if (array_key_exists('fields', $parameters)) {
            $fieldset = (array) $parameters['fields'];
            $fieldset = array_filter($fieldset);

            foreach ($fieldset as $resourceType => $fields) {

                $fields = explode(',', $fields);
                $fields = array_filter(array_map('trim', $fields));

                // the key must represent a resource type and be string format.
                // This skips anything that looks like the following:
                // e.g. &field[]=jake
                // $fields array cannot be empty.
                if (is_numeric($resourceType) || count($fields) === 0) {
                    continue;
                }

                foreach ($fields as $fieldName) {
                    // the field name must represent a string
                    // This skips anything that looks like the following:
                    // e.g. &field[user]=name,password,1
                    if (is_numeric($fieldName)) {
                        continue;
                    }

                    $fieldsetParameter->add($resourceType, $fieldName);
                }
            }
        }

        return $fieldsetParameter;
    }
}
