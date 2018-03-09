<?php

namespace Orion\Travelr\Http\Controllers;

use Illuminate\Http\JsonResponse;

trait BuildsHttpResponses
{
    private $data = [];

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function jsonResponse(array $data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($data, $status, $headers);
    }
}
