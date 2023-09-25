<div>
    <div>
        @foreach ($statuses as $s)
            <div class="bg-gray-300 text-gray-900 px-2 py-4 mb-2">{{$s->name}}</div>

            @foreach ($s->games as $game)
                <livewire:game-list-item :game="$game" :key="$game->id" />
            @endforeach
            
        @endforeach
    </div>
</div>
