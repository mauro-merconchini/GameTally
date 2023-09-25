<div>
    <div class="max-w-7xl mx-auto bg-white px-2 py-4 rounded-md mt-12">
        <form wire:submit="updateGame">
            <div class="mb-4">
                <label for="">Game title</label>
                <input type="text" wire:model="name" class="block w-full rounded-md">
            </div>
            <div>
                <label for="">Status</label>
                <select wire:model="status">
                    @foreach ($statuses as $staus)
                    <option value="{{$staus->id}}" @if($staus->id == $game->status_id) selected @endif>{{$staus->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Category: Current: {{$game->category->name}}</label>
                <select wire:model="category">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $game->category_id) selected
                        @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <x-button wire:click="loadIcons">Change icon</x-button>
            @if (!empty($icons))
                <div class="p-4">
                    <label for="selected-icons" class="block text-gray-700 font-bold mb-2">Select Icon:</label>
                    <div id="selected-icons" class="grid gap-3 grid-cols-12">
                        @foreach ($icons as $icon)
                        <div wire:click="selectIcon('{{ $icon }}')" class="icon-option cursor-pointer col-span-2 
                                                flex items-center border border-gray-300 
                                                rounded-md
                                        @if($icon == $selectedIcon) border-indigo-600 border-4 shadow-lg @endif">
                            <img src="{{ $icon }}" alt="Game Icon" class="w-full h-auto">
                        </div>
                        @endforeach
                    </div>
                    </label>
                </div>
            @endif
    
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
    </div>
</div>
