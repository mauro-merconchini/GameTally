<?php

namespace App\Livewire;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class GameList extends Component
{
    public $statuses = [];

    protected function loadGames()
    {
        $this->statuses = Status::with(['games' => function ($q) {
            return $q->where('user_id', auth()->user()->id);
        }])->get();
    }

    public function mount()
    {
        $this->loadGames();
    }

    #[On('gameAdded')]
    public function reloadGames()
    {
        $this->loadGames();
    }

    #[On('gameUpdated')]
    public function reloadGamesAgain()
    {
        $this->loadGames();
    }

    #[On('gameDeleted')]
    public function reloadGamesAgainAgain()
    {
        $this->loadGames();
    }
}
