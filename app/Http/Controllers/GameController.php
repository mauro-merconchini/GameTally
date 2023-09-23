<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Status;
use App\Services\SteamGridService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
        $searchResults = SteamGridService::getAutoCompleteResults($request->input('gameSearchTerm'));

        return view('games-search-result', ["gameArray" => $searchResults]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $defaultStatus = Status::where('name', 'Not Played')->first();
        // auth()->user()->games()->create([
        //     'name' => $request->input('name'),
        //     'category_id' => $request->input('category_id'),
        //     'status_id' => $defaultStatus->id,
        //     'icon_url' => 'https://via.placeholder.com/150',
        // ]);

        // return back();

        // dd($request);

        $iconUrl = SteamGridService::getGameIcon($request->input('game_id'));
        $defaultStatus = Status::where('name', 'Not Played')->first();
        $defaultCategory = Category::where('name', 'Medium')->first();

        auth()->user()->games()->create([
            'name' => $request->input('name'),
            'steamgrid_id' => $request->input('game_id'),
            'category_id' => $defaultCategory->id,
            'status_id' => $defaultStatus->id,
            'icon_url' => $iconUrl,
        ]);

        return redirect(route('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $game = auth()->user()->games()->findOrFail($id);

        // return a view with the game that has all the data for that game
        return view('edit-game', 
        [
            "game" => $game,
            "categories" => Category::all(),
            "statuses" => Status::all(),
            "icons" => SteamGridService::getAllIcons($game->steamgrid_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        auth()->user()->games()->findOrFail($id)
        ->update($request->only(['name', 'category_id', 'status_id', 'icon_url']));

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        auth()->user()->games()->findOrFail($id)->delete();

        return redirect(route('dashboard'));
    }
}
