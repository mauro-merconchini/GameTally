<?php

use App\Models\Game;
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
    return view('backlog', 
    [
        'games' => Game::with(['category', 'status'])->get(),
    ]);
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
});
