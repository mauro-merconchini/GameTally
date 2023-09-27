<div x-data="{showEdit: false}" x-on:click.away="showEdit = false" class="game-list-item border border-gray-300 rounded-md px-2 py-4 shadow-sm bg-white mb-4">
    @if (!empty($game))
        <div x-on:click="showEdit = !showEdit" class="grid grid-cols-12 gap-5 cursor-pointer">
            <div class="lg:col-span-1 col-span-2 flex lg:mr-3 items-center">
                <img src="{{ $game->icon_url }}" alt="{{ $game->name }}" class="w-full h-auto">
            </div>
            <div class="col-span-6 flex items-center">
                <div>
                    <h2 class="lg:text-xl font-semibold">{{ $game->name }}</h2>
                    <p class="text-gray-600 lg:text-sm text-xs">{{ $game->category->name }}</p>
                    <p class="text-gray-600 lg:text-sm text-xs">{{ $game->status->name }}</p>
                </div>
            </div>
        </div>

        <div x-show="showEdit" x-transition>
            <livewire:edit-game-form :game="$game" />
        </div>
        
    @endif
</div>