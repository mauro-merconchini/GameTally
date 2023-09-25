<?php

namespace App\Livewire;
use Livewire\Component;

class GameListItem extends Component
{
    public $game;

    public function mount($game)
    {
        $this->game = $game;
    }

    public function deleteGame()
    {
        $item = $this->game;

        $item->delete();
        $this->game = null;

        $this->dispatch('gameDeleted');
    }
}
