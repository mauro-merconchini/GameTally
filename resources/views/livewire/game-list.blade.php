<div>
    <div x-data="{show: true}">
        <div x-on:click="show = !show" class="bg-gray-300 text-gray-900 px-2 py-4 mb-2 cursor-pointer">In Progress</div>
        <div x-show="show" x-transition>
            @foreach ($statuses->where('name', 'In Progress')->first()->games as $game)
                <livewire:game-list-item :game="$game" wire:key="{{$game->id}}-InProgress" />
            @endforeach
        </div>
    </div>
    
    @foreach ($statuses->where('name', '!=', 'In Progress')->all() as $s)
    <div x-data="{show: false}">
        <div x-on:click="show = !show" class="bg-gray-300 text-gray-900 px-2 py-4 mb-2 cursor-pointer">{{$s->name}}</div>
        <div x-show="show" x-transition>
            @foreach ($s->games as $game)
                <livewire:game-list-item :game="$game" wire:key="{{$game->id}}-{{$s->name}}"/>
            @endforeach  
        </div>
    </div>  
    @endforeach
</div>
