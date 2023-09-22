<x-app-layout>
    <div class="col-span-5 flex gap-3">
        <form action="{{ route('games.destroy', $game) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </div>
    
    <div class="col-span-5 flex gap-3">
        <form action="{{ route('games.update', $game) }}" method="POST">
            <div>
                <label for="">New Status</label>
                <select name="status_id" id="">
                    @foreach ($statuses as $staus)
                        <option value="{{$staus->id}}">{{$staus->name}}</option>
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

