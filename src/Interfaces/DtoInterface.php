<?php

namespace App\Interfaces;

interface DtoInterface
{
    public static function map(array $data): self;
    public static function nestedMap(array $data): array;
}