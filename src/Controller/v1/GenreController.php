<?php

namespace App\Controller\v1;

use App\Models\Genres\Action\GenreAction;
use Laminas\Diactoros\Response\JsonResponse;

class GenreController
{
    public function read(): JsonResponse
    {
        $action = new GenreAction();
        return $action->execute([]);
    }
}
