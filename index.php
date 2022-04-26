<?php

ini_set("display_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';

use \MiladRahimi\PhpRouter\Router;

$router = Router::create();

$router->post('/api/video_game', [\App\Controller\v1\VideGameController::class, 'create'], 'video_game_create');
$router->get('/api/video_game', [\App\Controller\v1\VideGameController::class, 'read'], 'video_game_read');
$router->put('/api/video_game/{id}', [\App\Controller\v1\VideGameController::class, 'update'], 'video_game_update');
$router->delete('/api/video_game/{id}', [\App\Controller\v1\VideGameController::class, 'delete'], 'video_game_delete');

$router->get('/api/genre', [\App\Controller\v1\GenreController::class, 'read'], 'genre_read');

$router->dispatch();
