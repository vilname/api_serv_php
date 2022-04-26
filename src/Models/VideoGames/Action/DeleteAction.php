<?php

namespace App\Models\VideoGames\Action;

use App\Models\VideoGames\VideoGameRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;

class DeleteAction
{
    public function execute(int $id)
    {
        try {
            $videoGameRepository = new VideoGameRepository();
            $videoGameEntity = $videoGameRepository->getById($id);
            $videoGameRepository->delete($videoGameEntity);
        } catch (\Exception $e) {
            return new ErrorResource([
                'message' => 'Ошибка удаления',
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => 'Успешное удаление видео игры',
            'status_code' => 'success'
        ]);
    }
}
