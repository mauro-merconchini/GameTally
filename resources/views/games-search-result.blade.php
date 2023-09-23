<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white rounded-md px-2 py-4 mt-24">
        @foreach ($gameArray as $game)
        <div class="border-b border-gray-300 mb-4 py-4 px-2">
            <form action="{{route('games.store')}}" method="POST" class="block w-full">
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <p class="font-bold text-xl">{{$game['name']}}</p>
                        <input type="hidden" name="name" value="{{$game['name']}}">
                        <input type="hidden" name="game_id" value="{{$game['id']}}">
                    </div>
                    <div>
                        <button type="submit" class="bg-indigo-600 px-2 py-4 rounded-lg text-md text-white">This one</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
        @endforeach
    </div>
</x-app-layout>