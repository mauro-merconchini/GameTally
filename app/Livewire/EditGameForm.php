<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Game;
use App\Models\Status;
use App\Services\SteamGridService;
use Livewire\Component;

class EditGameForm extends Component
{
    public $game;
    public $categories;
    public $statuses;
    public $icons;
    public $selectedIcon;

    public function mount(Game $game)
    {
        $this->game = $game;
        $this->categories = Category::all();
        $this->statuses = Status::all();
        $this->icons = SteamGridService::getAllIcons($game->steamgrid_id);
        $this->selectedIcon = $game->icon_url;
    }

    public function selectIcon(string $url)
    {
        $this->selectedIcon = $url;
    }
}
