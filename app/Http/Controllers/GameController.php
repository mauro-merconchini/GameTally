<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Status;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $defaultStatus = Status::where('name', 'Not Played')->first();
        auth()->user()->games()->create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'status_id' => $defaultStatus->id,
            'icon_url' => 'https://via.placeholder.com/150',
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return a view with the game that has all the data for that game
        return view('edit-game', 
        [
            "game" => auth()->user()->games()->with(['category', 'status'])->findOrFail($id),
            "categories" => Category::all(),
            "statuses" => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        auth()->user()->games()->findOrFail($id)->update(['status_id' => $request->input('status_id')]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        auth()->user()->games()->findOrFail($id)->delete();

        return back();
    }
}
