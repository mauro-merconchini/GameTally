@props(["games"])

<div>
    @foreach ($games as $game)
        <x-game-list-item :game="$game"/>
    @endforeach
</div>
