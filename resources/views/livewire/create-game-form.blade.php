<div>
    <div class="px-2 py-4 rounded-md w-full">
        <label for="combobox" class="block text-sm font-medium leading-6 text-gray-900">Search for a game</label>
        <div class="relative mt-2">
            <input wire:model.live.debounce.200ms="search" type="text"
                class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-12 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                role="combobox" aria-controls="options" aria-expanded="false">
    
            @if (count($suggestions) > 0)
                <ul class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                    id="options" role="listbox">
                
                    @foreach ($suggestions as $index => $s)
                    <li wire:click="selectGame({{$index}})" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" id="option-0" role="option"
                        tabindex="-1">
                        <div class="flex items-center">
                            <div class="w-12 flex items-center">
                                <img src="{{$s['icon_url']}}"
                                    alt="" class="w-full h-auto flex-shrink-0">
                            </div>
                            <!-- Selected: "font-semibold" -->
                            <span class="ml-3 truncate text-2xl font-semibold">{{$s['name']}}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    @if (!blank($selectedGame))
        <div class="w-full rounded-md bg-white px-2 py-4">
            <form wire:submit="addGame">
                <div class="mb-4">
                    <label for="" class="mb-2">Game name</label>
                    <input type="text" disabled value="{{$selectedGame['name']}}"
                        class="block border border-gray-400 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="">Game length</label>
                    <select name="category_id" wire:model="category">
                        @foreach ($categories as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Add game
                </button>
            </form>
        </div>
    @endif
</div>
