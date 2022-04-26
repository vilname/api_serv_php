<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="video_games")
 * @ORM\Entity
 */
class VideoGamesEntity implements \JsonSerializable
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**  @ORM\Column(type="string") */
    private string $name;

    /** @ORM\Column(type="string") */
    private string $developer;

    /** @ORM\Column(type="string", name="genre_id") */
    private int $genreId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $developer
     */
    public function setDeveloper(string $developer): void
    {
        $this->developer = $developer;
    }

    /**
     * @param int $genreId
     */
    public function setGenreId(int $genreId): void
    {
        $this->genreId = $genreId;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('name', [
            new Assert\NotBlank([
                'message' => 'Поле не должно быть пустым'
            ]),
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('developer', [
            new Assert\NotBlank([
                'message' => 'Поле не должно быть пустым'
            ]),
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('genreId', [
            new Assert\NotBlank([
                'message' => 'Поле не должно быть пустым'
            ]),
            new Assert\Type([
                'type' => 'integer',
                'message' => 'Поле должно быть числом',
            ])
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'genre_id' => $this->genreId,
        ];
    }
}
