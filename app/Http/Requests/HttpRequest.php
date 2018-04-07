<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HttpRequest extends FormRequest
{
    public function getFilters(): array
    {
        return (array) $this->get('filter', []);
    }

    /**
     * Retrieves an array of the query parameter fieldsets.
     * e.g. &fields[user]=name,password&fields[posts]=name,description
     *
     * @return FieldsetsParameter
     */
    public function getFieldSets(): FieldsetsParameter
    {
        $fieldset = (array) $this->get('fields', []);
        $fieldset = array_filter($fieldset);

        $fieldsetParameter = new FieldsetsParameter;
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

                $fieldsetParameter->addFieldset($resourceType, $fieldName);
            }
        }

        return $fieldsetParameter;
    }
}
