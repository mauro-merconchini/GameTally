{{-- @props(["game"])

<div class=" flex grid grid-cols-12">
    <div class="text-lg col-span-1">{{$game->icon_url}}</div>
    <div class="text-lg col-span-6">{{$game->name}}</div> 
    <div class="text-lg">{{$game->category->name}}</div> 
    <div class="text-lg">{{$game->status->name}}</div>
</div> --}}





{{-- @props(["game"])

<div class="my-4 mx-auto w-3/4 p-4 text-center">
    <div class="flex items-center justify-center">
        <div class="mr-4">
            <img src="{{ $game->icon_url }}" alt="{{ $game->name }}" class="w-16 h-16 rounded-full">
        </div>
        <div>
            <h2 class="text-xl font-semibold">{{ $game->name }}</h2>
            <p class="text-gray-600">{{ $game->category->name }}</p>
            <p class="text-gray-600">{{ $game->status->name }}</p>
        </div>
    </div>
</div> --}}






{{-- BACKUP
@props(["game"])

<div class="my-4 mx-auto w-1/2 p-4 text-center flex items-center justify-between">
    <div class="flex items-center">
        <div class="mr-4">
            <img src="{{ $game->icon_url }}" alt="{{ $game->name }}" class="w-8 h-8">
        </div>
        <div>
            <h2 class="text-xl font-semibold">{{ $game->name }}</h2>
            <p class="text-gray-600">{{ $game->category->name }}</p>
            <p class="text-gray-600">{{ $game->status->name }}</p>
        </div>
    </div>
</div> --}}



@props(["game"])

<div class="my-4 mx-auto w-1/2 p-4 flex flex-row items-center justify-between">
            
        <div>
            {{-- <img src="{{ $game->icon_url }}" alt="{{ $game->name }}" class="w-8 h-8"> --}}
            <img src="https://cdn2.steamgriddb.com/file/sgdb-cdn/icon/f6e25176c96f7d7c8c7d74ff8babee5d/32/256x256.png" alt="{{ $game->name }}" class="w-8 h-8">
            <h2 class="text-xl font-semibold">{{ $game->name }}</h2>
            <p class="text-gray-600 text-sm">{{ $game->category->name }}</p>
            <p class="text-gray-600 text-sm">{{ $game->status->name }}</p>
        </div>
</div>
