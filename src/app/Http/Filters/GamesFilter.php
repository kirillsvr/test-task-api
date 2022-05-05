<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GamesFilter extends AbstractFilter
{
    public const GENRES = 'genres';

    protected function getCallbacks(): array
    {
        return [
            self::GENRES => [$this, 'genres'],
        ];
    }

    public function genres(Builder $builder, $value)
    {
        $builder->select('games.*')->rightJoin('game_genre', 'games.id', '=', 'game_genre.game_id')->whereIn('genre_id', $value);
    }
}
