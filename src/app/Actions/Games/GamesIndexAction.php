<?php

namespace App\Actions\Games;

use App\Http\Filters\GamesFilter;
use App\Http\Resources\GamesCollection;
use App\Models\Games;
use Illuminate\Database\Eloquent\Collection;

class GamesIndexAction
{
    /**
     * @param array $request
     * @return GamesCollection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function execute(array $request): GamesCollection
    {
        return new GamesCollection($this->getFilteredGames($request));
    }

    /**
     * @param array $request
     * @return Collection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function getFilteredGames(array $request): Collection
    {
        return Games::filter($this->makeFilter($request))->with('developer', 'genres')->get();
    }

    /**
     * @param array $request
     * @return GamesFilter
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeFilter(array $request): GamesFilter
    {
        return app()->make(GamesFilter::class, ['queryParams' => array_filter($request)]);
    }
}
