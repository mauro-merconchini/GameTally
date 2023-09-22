@props(["game"])

<div class="border border-gray-300 rounded-md px-2 py-4 shadow-sm bg-white mb-4">
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-1 flex items-center">
            <img src="https://cdn2.steamgriddb.com/file/sgdb-cdn/icon/f6e25176c96f7d7c8c7d74ff8babee5d/32/256x256.png"
                alt="{{ $game->name }}" class="w-full h-auto">
        </div>
        <div class="col-span-6 flex items-center">
            <div>
                <h2 class="text-xl font-semibold">{{ $game->name }}</h2>
                <p class="text-gray-600 text-sm">{{ $game->category->name }}</p>
                <p class="text-gray-600 text-sm">{{ $game->status->name }}</p>
            </div>
        </div>
        <div class="col-span-5 flex gap-3">
            <form action="{{ route('games.destroy', $game) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>
