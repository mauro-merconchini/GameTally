@props(["games"])

@php
    $statuses = App\Models\Status::all()
@endphp

<div>
    @foreach ($games as $game)
        <x-game-list-item :game="$game" :statuses="$statuses"/>
    @endforeach
</div>
