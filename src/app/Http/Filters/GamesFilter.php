<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GamesFilter extends AbstractFilter
{
    public const GENRES = 'genres';
    public const DEVELOPERS = 'developers';
    public const STATUS = 'status';

    protected function getCallbacks(): array
    {
        return [
            self::GENRES => [$this, 'genres'],
            self::DEVELOPERS => [$this, 'developers'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function genres(Builder $builder, $value)
    {
        $builder->select('games.*')->rightJoin('game_genre', 'games.id', '=', 'game_genre.game_id')->whereIn('genre_id', $value);
    }

    public function developers(Builder $builder, $value)
    {
        $builder->whereIn('developer_id', $value);
    }

    public function status(Builder $builder, $value)
    {
        $builder->select('games.*')->rightJoin('statuses', 'games.status_id', '=', 'statuses.id')->whereIn('statuses.name', $value);
    }
}
