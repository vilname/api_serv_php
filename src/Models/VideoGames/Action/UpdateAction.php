<?php

namespace App\Models\VideoGames\Action;

use App\Models\VideoGames\Dto\VideoGamesDto;
use App\Models\VideoGames\VideoGameRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;

class UpdateAction
{
    public function execute(VideoGamesDto $videoGamesDto, int $id): JsonResponse
    {
        try {
            $videoGameRepository = new VideoGameRepository();
            $videoGameEntity = $videoGameRepository->getById($id);
            $videoGameRepository->add($videoGameEntity, $videoGamesDto);
        } catch (\Exception $e) {
            return new ErrorResource([
                'message' => 'Ошибка изменения',
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
           'data' => 'Успешное изменение видео игры',
           'status_code' => 'success'
        ]);
    }
}
