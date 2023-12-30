<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Status;
use App\Services\SteamGridService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateGameForm extends Component
{
    public $search = '';

    public $suggestions = [];

    public $selectedGame = [];

    public $categories;

    public $statuses;

    /**
     * Variables we need from game form
     */
    public $category;

    public $status;

    public function mount()
    {
        $this->categories = Category::all();
        $this->category = $this->categories->first()->id;

        $this->statuses = Status::all();
        $this->status = $this->statuses->last()->id;
    }

    public function updatedSearch()
    {
        if(blank($this->search)) {
            $this->suggestions = [];
            return;
        }

        $games = collect(SteamGridService::getAutoCompleteResults($this->search))->take(3)->toArray();

        $suggestions = collect($games)->map(function($game) {
            return [
                'name' => $game['name'],
                'steamgrid_id' => $game['id'],
                'icon_url' => SteamGridService::getGameIcon($game['id']),
            ];
        });

        $this->suggestions = $suggestions->toArray();
    }

    public function selectGame(int $index)
    {
        $this->selectedGame = $this->suggestions[$index];
        $this->suggestions = [];
        $this->search = '';
    }

    public function addGame()
    {
        $defaultStatus = Status::where('name', 'Not Played')->first();

        auth()->user()->games()->create([
            'name' => $this->selectedGame['name'],
            'steamgrid_id' => $this->selectedGame['steamgrid_id'],
            'category_id' => $this->category,
            'status_id' => $this->status,
            'icon_url' => $this->selectedGame['icon_url'],
        ]);

        $this->dispatch('gameAdded');
        $this->resetAll();
        // return redirect(route('dashboard'));
    }

    protected function resetAll()
    {
        $this->reset('search', 'suggestions', 'selectedGame');
    }
}
