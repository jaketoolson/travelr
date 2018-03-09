<?php

namespace Orion\Travelr\Http\Controllers;

use Illuminate\Http\JsonResponse;
use is_object;

trait BuildsHttpResponses
{
    private $data = [];

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function jsonResponse($data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($data, $status, $headers);
    }
}
