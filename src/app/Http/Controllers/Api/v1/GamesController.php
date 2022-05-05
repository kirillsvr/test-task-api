<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\Games\GamesIndexAction;
use App\Actions\Games\GamesStoreAction;
use App\Actions\Games\GamesUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GamesFilterRequest;
use App\Http\Requests\GamesStoreRequest;
use App\Http\Resources\GamesCollection;
use App\Http\Resources\GamesResource;
use App\Models\Games;
use Illuminate\Http\Response;

class GamesController extends Controller
{
    /**
     * @param GamesFilterRequest $request
     * @param GamesIndexAction $action
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(GamesFilterRequest $request, GamesIndexAction $action)
    {
        return response()->json(['success' => true, 'results' => $action->execute($request->validated())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param GamesStoreRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function store(GamesStoreRequest $request, GamesStoreAction $action)
    {
        return response()->json(['success' => true, 'results' => $action->execute($request->validated())]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['success' => true, 'results' => new GamesResource(Games::with('developer', 'genres')->findOrFail($id))]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param GamesStoreRequest $request
     * @param Games $game
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function update(GamesStoreRequest $request, Games $game, GamesUpdateAction $action)
    {
        return response()->json(['success' => true, 'results' => $action->execute($game, $request->validated())]);
    }

    /**
     * @param Games $game
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(Games $game)
    {
        $game->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
