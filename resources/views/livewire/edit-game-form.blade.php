<div>
	@if (!empty($game))
		<div class="my-4 border-t border-gray-300"></div>
		<div class="max-w-7xl mx-auto bg-white px-2">
			<form wire:submit="updateGame">
				<div class="grid grid-cols-12 gap-5">
					<div class="col-span-9">
						<label class="font-bold text-lg">Title</label>
						<input type="text" wire:model="name" class="block w-full rounded-2xl">
					</div>
					<div class="col-span-3">
						<label class="font-bold text-lg">Category:</label>
						<select wire:model="category" class="block rounded-2xl">
							@foreach ($categories as $category)
								<option value="{{$category->id}}" @if($category->id == $game->category_id) selected
								@endif>{{$category->name}}</option>
							@endforeach
						</select>
					</div> 
				</div>

				<div class="grid grid-cols-12 gap-5 mt-5">
					@foreach ($statuses as $s)
							<div wire:click="selectStatus({{$s->id}})" class="col-span-4 border-2 text-center py-2 cursor-pointer rounded-2xl @if($s->id == $status) border-indigo-600 @else border-gray-400 @endif">
								<p class="text-lg">{{$s->name}}</p>
							</div>
					@endforeach
				</div>

				<div class="mt-3">

					<div class="flex justify-between">
						<div class="flex justify-start gap-5">
							<x-button type="submit">Update</x-button>

							@if (empty($icons))
								<x-secondary-button wire:click="loadIcons">Change Icon</x-secondary-button>                
							@endif
						</div>

						<x-danger-button wire:click="deleteGame">Delete</x-danger-button>
						
					</div>
				</div>

				<div wire:loading class="mt-4 mb-4">
					<span class="loader"></span>
				</div>

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
			</form>
		</div>		
	@endif
</div>
