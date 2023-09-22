<x-app-layout>
    @foreach ($gameArray as $game)
        <p for="">{{$game['name']}}</p>
    @endforeach
</x-app-layout>