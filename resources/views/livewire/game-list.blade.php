<div>
    <div>
        @foreach ($games as $game)
            <livewire:game-list-item :game="$game" :key="$game->id"/>
        @endforeach
    </div>
</div>
