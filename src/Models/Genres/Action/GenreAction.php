<?php

namespace App\Models\Genres\Action;

use App\Interfaces\ApiResultInterface;
use App\Models\Genres\GenreRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;

class GenreAction implements ApiResultInterface
{
    public function execute(array $itemsEntityDto): JsonResponse
    {
        try {
            $userRepository = new GenreRepository();
            $genres = $userRepository->getGenres();
        } catch (\Exception $e) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка получения токена'
                ],
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => ['genres' => $genres],
            'status_code' => 'success'
        ]);
    }
}