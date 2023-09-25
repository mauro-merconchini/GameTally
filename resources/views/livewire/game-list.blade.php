<div>
    <div x-data="{show: true}">
        <div class="bg-gray-300 text-gray-900 px-2 py-4 mb-2">In Progress</div>
        
        @foreach ($statuses->where('name', 'In Progress')->first()->games as $game)
            <livewire:game-list-item :game="$game" :key="$game->id" />
        @endforeach
    </div>
    
    @foreach ($statuses->where('name', '!=', 'In Progress')->all() as $s)
        <div x-data="{show: false}">
            <div x-on:click="show = !show" class="bg-gray-300 text-gray-900 px-2 py-4 mb-2">{{$s->name}}</div>
        
            <div x-show="show">
        
                @foreach ($s->games as $game)
                <livewire:game-list-item :game="$game" :key="$game->id" />
                @endforeach
            </div>
        </div>
    @endforeach
</div>
