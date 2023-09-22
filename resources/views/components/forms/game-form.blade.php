<div class="w-full rounded-md bg-white px-2 py-4">
    <form action="{{route('games.store')}}" method="POST">
        <div class="mb-4">
            <label for="" class="mb-2">Game name</label>
            <input type="text" name="name" placeholder="Game name..." id="" class="block border border-gray-400 rounded-md w-full">
        </div>
        <div class="mb-4">
            <label for="">Game length</label>
            <select name="category_id" id="">
                @foreach (App\Models\Category::all() as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
        @csrf

        <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
            Add game
        </button>
    </form>
</div>