<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\Attributes\On;

class GameListItem extends Component
{
    public $game;

    public function mount($game)
    {
        $this->game = $game;
    }

    #[On('gameUpdated')]
    public function updateGame(int $gameId)
    {
        if ($this->game->id == $gameId)
        {
            $this->game->refresh();
        }
    }
}
