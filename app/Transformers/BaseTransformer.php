<?php

namespace Orion\Travelr\Transformers;

use Illuminate\Support\Collection;
use Orion\Travelr\BaseModel;

abstract class BaseTransformer
{
    public static function transformToArray($data): array
    {
        $static = new static;
        if ($data instanceof Collection) {
            return $static->transformCollectionToMethodType($data, 'toArray')->toArray();
        }

        return $static->toArray($data);
    }

    public function toArray(BaseModel $modelOrCollection): array
    {
        //
    }

    private function transformCollectionToMethodType(Collection $collection, string $methodName): Collection
    {
        return $collection->map([$this, $methodName]);
    }
}
