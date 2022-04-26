<?php


namespace App\Models\VideoGames;


use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class VideoGameService
{
    public static function validate($entity): ConstraintViolationListInterface
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        return $validator->validate($entity);
    }
}