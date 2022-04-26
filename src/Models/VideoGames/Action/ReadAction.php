<?php

namespace App\Models\VideoGames\Action;

use App\Interfaces\ApiResultInterface;
use App\Models\VideoGames\VideoGameRepository;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;

class ReadAction implements ApiResultInterface
{
    public function execute(array $itemsEntityDto): JsonResponse
    {
        $videoGameRepository = new VideoGameRepository();
        $videoGames = $videoGameRepository->getVideoGames();

        return new SuccessResource([
            'data' => $videoGames,
            'status_code' => 'success'
        ]);
    }
}
