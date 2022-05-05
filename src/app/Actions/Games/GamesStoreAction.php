<?php

namespace App\Actions\Games;

use App\Http\Resources\GamesResource;
use App\Models\Games;

class GamesStoreAction
{
    private Games $game;

    /**
     * @param array $data
     * @return GamesResource
     */
    public function execute(array $data): GamesResource
    {
        $this->createGame($data);

        if (isset($data['genres'])) $this->createGenreRelations($data['genres']);

        return new GamesResource($this->game);
    }

    /**
     * @param array $data
     * @return void
     */
    private function createGame(array $data): void
    {
        $this->game = Games::create($data);
    }

    /**
     * @param array $genres
     * @return void
     */
    private function createGenreRelations(array $genres): void
    {
        $this->game->genres()->sync($genres);
    }
}
