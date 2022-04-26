<?php

namespace App\Models\VideoGames;

use App\Entity\VideoGamesEntity;
use App\EntityManagerFactory;
use App\Models\VideoGames\Dto\VideoGamesDto;
use Doctrine\ORM\EntityManager;

class VideoGameRepository
{
    public EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::query();
    }

    /**
     * @param VideoGamesDto[] $itemsEntityDto
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function massAdd(array $itemsEntityDto)
    {
        foreach ($itemsEntityDto as $field) {
            $entity = new VideoGamesEntity();

            $entity->setName($field->name);
            $entity->setDeveloper($field->developer);
            $entity->setGenreId($field->genreId);

            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();
    }

    public function add(VideoGamesEntity $videoGamesEntity, VideoGamesDto $itemDto)
    {
        $videoGamesEntity->setName($itemDto->name);
        $videoGamesEntity->setDeveloper($itemDto->developer);
        $videoGamesEntity->setGenreId($itemDto->genreId);

        $this->entityManager->persist($videoGamesEntity);
        $this->entityManager->flush();
    }

    public function getVideoGames(): array
    {
        return $this->entityManager->getRepository(VideoGamesEntity::class)->findAll();
    }

    public function getById(int $id)
    {
        return $this->entityManager->getRepository(VideoGamesEntity::class)->find($id);
    }

    public function delete(VideoGamesEntity $itemEntity)
    {
        $this->entityManager->remove($itemEntity);
        $this->entityManager->flush();
    }
}
