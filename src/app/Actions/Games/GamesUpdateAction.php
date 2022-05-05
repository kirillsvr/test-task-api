<?php

namespace App\Actions\Games;

use App\Http\Resources\GamesResource;
use App\Models\Games;

class GamesUpdateAction
{
    /**
     * @param Games $game
     * @param array $request
     * @return GamesResource
     */
    public function execute(Games $game, array $request): GamesResource
    {
        $this->updateGame($game, $request);
        $this->createGenreRelations($game, $request);

        return new GamesResource($game);
    }

    /**
     * @param Games $game
     * @param array $request
     * @return void
     */
    private function updateGame(Games $game, array $request): void
    {
        $game->update($request);
    }

    /**
     * @param Games $game
     * @param array $genres
     * @return void
     */
    private function createGenreRelations(Games $game, array $genres): void
    {
        $game->genres()->sync($genres['genres'] ?? []);
    }
}
