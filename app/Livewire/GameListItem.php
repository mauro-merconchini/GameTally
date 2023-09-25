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

        return redirect(route('dashboard')); 
        // TAKE OUT THIS REDIRECT AND TURN IT INTO AND EVENT AND A LISTENER

        
    }
}
