<?php

namespace App\Models\Genres;

use App\Entity\GenresEntity;
use App\EntityManagerFactory;
use Doctrine\ORM\EntityManager;

class GenreRepository
{
    public EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::query();
    }

    public function getGenres()
    {
        return $this->entityManager->getRepository(GenresEntity::class)->findAll();
    }
}
