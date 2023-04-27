<div>
    <div class="flex gap-3 mb-2">
        {{-- @if ($photo && !$errors->has('photo'))
        <img class="w-12 h-12 rounded-full" src="{{ $photo->temporaryUrl() }}" alt="Extra large avatar">
    @elseif($userPhoto && !$errors->has('photo'))
        <img class="w-12 h-12 rounded-full" src="{{ asset($userPhoto) }}" alt="Extra large avatar">
    @else
        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
    @endif --}}

    </div>
    <form wire:submit.prevent="save" class="space-y-6">
        <div class="w-full ">
            <div>
                <x-default-input name="name" type="text" label="Nome" />
            </div>
        </div>
        <div class="w-full ">
            <div>
                <x-default-input name="email" type="text" label="E-mail" />
            </div>
        </div>
        <div>
            <x-short-button wireTarget="save" buttonText="Salvar" />
        </div>
    </form>
</div>
