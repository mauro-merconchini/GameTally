<?php

namespace App\Livewire;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class GameList extends Component
{
    public $games = [];
    public $statuses = [];

    const PLAYED_STATUS = 1;
    const IN_PROGRESS_STATUS = 2;
    const UNPLAYED_STATUS = 3;

    public function mount()
    {
        // $this->games = auth()->user()->games;
        $this->games = self::sortByStatus(auth()->user()->games);
        $this->statuses = Status::all();
    }

    #[On('gameAdded')]
    public function gameAdded()
    {
        $this->games = auth()->user()->games;
    }

    private function sortByStatus($games): Collection
    {
        $unplayed = $games->where('status_id', self::UNPLAYED_STATUS);
        $played = $games->where('status_id', self::PLAYED_STATUS);
        $inProgress = $games->where('status_id', self::IN_PROGRESS_STATUS);

        return $inProgress->concat($unplayed)->concat($played);
    }
}
