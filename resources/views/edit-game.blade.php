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
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $game->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="p-4">
                <label for="selected-icons" class="block text-gray-700 font-bold mb-2">Select Icon:</label>
                    <div id="selected-icons" class="flex space-x-4">
                        @foreach ($icons as $icon)
                        <div class="icon-option cursor-pointer">
                            <input type="radio" name="icon_url" value="{{ $icon }}" @if($icon == $game->icon_url) checked @endif>
                            <img src="{{ $icon }}" alt="Game Icon">
                        </div>
                        @endforeach
                    </div>
                </label>
            </div>
    
            @csrf
            @method('PUT')
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
</x-app-layout>

