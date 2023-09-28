<?php

use App\Http\Controllers\GameController;
use App\Models\Game;
use App\Models\User;
use App\Services\SteamGridService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(auth()->check())
    {
        return redirect(route('dashboard'));
    }

    return view('welcome');
});

Route::get("/api/{user_id}", function($user_id) {
    return User::find($user_id)->games;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', 
        [
            'games' => auth()->user()->games()->with(['category', 'status'])->get()
        ]);
    })->name('dashboard');

    Route::resource('games', \App\Http\Controllers\GameController::class)->except(['index', 'show']);

    Route::post('/game-search', [GameController::class, 'search'])->name('search');
});
