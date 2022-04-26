<?php

namespace App\Models\VideoGames\Dto;

use App\Interfaces\DtoInterface;

class VideoGamesDto implements DtoInterface
{
    public string $name;
    public string $developer;
    public int $genreId;

    public static array $items;

    public static function map(array $data): self
    {
        $o = new self();

        $o->name = $data['name'];
        $o->developer = $data['developer'];
        $o->genreId = $data['genre_id'];

        return $o;
    }

    public static function nestedMap(array $data): array
    {
        foreach ($data as $field) {
            self::$items[] = self::map($field);
        }

        return self::$items;
    }
}