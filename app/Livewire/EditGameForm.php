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
    public $category;
    public $status;
    public $name;

    public function mount(Game $game)
    {
        $this->game = $game;
        $this->categories = Category::all();
        $this->statuses = Status::all();
        $this->icons = SteamGridService::getAllIcons($game->steamgrid_id);
        $this->selectedIcon = $game->icon_url;
        $this->name = $game->name;
        $this->category = $game->category_id;
        $this->status = $game->status_id;
    }

    public function selectIcon(string $url)
    {
        $this->selectedIcon = $url;
    }

    public function updateGame()
    {
        $this->game->update([
            "name" => $this->name,
            "category_id" => $this->category,
            "status_id" => $this->status,
            "icon_url" => $this->selectedIcon,
        ]);

        $this->dispatch('gameUpdated', $this->game->id);
    }
}
