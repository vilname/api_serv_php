<?php

namespace App\Models\VideoGames\Action;

use App\Interfaces\ApiResultInterface;
use App\Interfaces\DtoInterface;
use App\Models\VideoGames\Dto\VideoGamesDto;
use App\Models\VideoGames\VideoGameRepository;
use App\Models\VideoGames\VideoGameService;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;
use Symfony\Component\Validator\ConstraintViolation;

class CreateAction implements ApiResultInterface
{
    /**
     * @param DtoInterface[] $itemsEntityDto
     * @return JsonResponse
     */
    public function execute(array $itemsEntityDto): JsonResponse
    {
        /** @var VideoGamesDto $videoGamesDto */
        try {
            $resultError = [];
            foreach ($itemsEntityDto as $videoGamesDto) {
                $errors = VideoGameService::validate($videoGamesDto);

                /** @var ConstraintViolation $error */
                foreach ($errors as $error) {
                    $resultError[] = $error->getPropertyPath().": ".$error->getMessage();
                }
            }

            if ($resultError) {
                return new ErrorResource(['message' => $resultError]);
            }

            $itemRepository = new VideoGameRepository();
            $itemRepository->massAdd($itemsEntityDto);
        } catch (\Exception $e) {
            return new ErrorResource([
                'data' => [
                    'message' => $e->getMessage()
                ],
                'error_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => [
                'message' => 'Данные успешно сохранены'
            ],
            'error_code' => 'success'
        ]);
    }
}
