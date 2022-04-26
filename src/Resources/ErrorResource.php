<?php

namespace App\Resources;

use Laminas\Diactoros\Response\JsonResponse;

class ErrorResource extends JsonResponse
{
    public function __construct($data, int $status = 500, array $headers = [], int $encodingOptions = self::DEFAULT_JSON_FLAGS)
    {
        parent::__construct($data, $status, $headers, $encodingOptions);
    }
}