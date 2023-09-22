<x-app-layout>

    <div class="max-w-7xl mx-auto bg-white px-2 py-4 rounded-md mt-12">
        <form action="{{ route('games.update', $game) }}" method="POST">
            <div class="mb-4">
                <label for="">Game title</label>
                <input type="text" name="name" class="block w-full rounded-md" value="{{$game->name}}" id="">
            </div>
            <div>
                <label for="">Status</label>
                <select name="status_id" id="">
                    @foreach ($statuses as $staus)
                        <option value="{{$staus->id}}" @if($staus->id == $game->status_id) selected @endif>{{$staus->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Category: Current: {{$game->category->name}}</label>
                <select name="category_id" id="">
                    @foreach ($categories as $c)
                        <option value="{{$c->id}}" @if($c->id == $game->category_id) selected @endif>{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
    
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
</x-app-layout>

