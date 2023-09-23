<div>
    <div>
        @foreach ($games as $game)
            <x-game-list-item :game="$game" :statuses="$statuses" />
        @endforeach
    </div>
</div>
