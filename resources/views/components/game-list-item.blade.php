@props(["game", "statuses"])

<div class="border border-gray-300 rounded-md px-2 py-4 shadow-sm bg-white mb-4">
    @if (!empty($game))
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-1 flex mr-3 items-center">
                <img src="{{ $game->icon_url }}" alt="{{ $game->name }}" class="w-full h-auto">
            </div>
            <div class="col-span-6 flex items-center">
                <div>
                    <h2 class="text-xl font-semibold">{{ $game->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $game->category->name }}</p>
                    <p class="text-gray-600 text-sm">{{ $game->status->name }}</p>
                </div>
            </div>
        
            <a wire:navigate href="{{route('games.edit', ['game' => $game->id])}}">EDIT</a>
        
            <form method="POST" action="{{ route('games.destroy', $game->id) }}">
                @csrf
                @method('DELETE')
        
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        
        </div>
    @endif
</div>
