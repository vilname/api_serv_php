<?php

namespace App\Controller\v1;

use App\Models\VideoGames\Action\CreateAction;
use App\Models\VideoGames\Action\DeleteAction;
use App\Models\VideoGames\Action\ReadAction;
use App\Models\VideoGames\Action\UpdateAction;
use App\Models\VideoGames\Dto\ItemDto;
use App\Models\VideoGames\Dto\VideoGamesDto;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequest;

class VideGameController
{
    public function create(ServerRequest $request): JsonResponse
    {
        $action = new CreateAction();
        return $action->execute(VideoGamesDto::nestedMap(json_decode($request->getBody()->getContents(), true)));
    }

    public function read(ServerRequest $request): JsonResponse
    {
        $action = new ReadAction();
        return $action->execute([]);
    }

    public function update(ServerRequest $request, int $id): JsonResponse
    {
        $action = new UpdateAction();
        return $action->execute(VideoGamesDto::map(json_decode($request->getBody()->getContents(), true)), $id);
    }

    public function delete(ServerRequest $request, int $id): JsonResponse
    {
        $action = new DeleteAction();
        return $action->execute($id);
    }
}
