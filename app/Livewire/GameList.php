<?php

namespace App\Livewire;

use App\Models\Status;
use Livewire\Component;
use Livewire\Attributes\On;

class GameList extends Component
{
    public $games = [];
    public $statuses = [];

    public function mount()
    {
        $this->games = auth()->user()->games;
        $this->statuses = Status::all();
    }

    #[On('gameAdded')]
    public function gameAdded()
    {
        $this->games = auth()->user()->games;
    } 
}
