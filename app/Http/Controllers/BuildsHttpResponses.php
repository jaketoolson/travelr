<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Http\Controllers;

use Illuminate\Http\JsonResponse;

trait BuildsHttpResponses
{
    private $data = [
        'items' => [],
    ];

    public function setItems(array $items): void
    {
        $this->data['items'] = $items;
    }

    public function jsonResponse($data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($data, $status, $headers);
    }
}
