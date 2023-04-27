<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <section class="max-w-xl">

        <div class="flex gap-3 mb-2">
            @if ($photo && !$errors->has('photo'))
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
            @endif
            <div>
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edição de Perfil
                </h5>
            </div>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            Atualize as informações de sua conta e seu endereço de e-mail
        </p>
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="w-full ">
                <label class="block mb-2 text-sm font-medium @error('photo') text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @enderror " for="file_input">Foto de
                    perfil
                    <svg wire:loading wire:target="photo" aria-hidden="true" role="status"
                        class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                </label>
                <input wire:model="photo"
                    class="block w-full bg-gray-50 dark:bg-gray-700 text-sm border rounded-lg cursor-pointer dark:text-white  @error('photo') border-red-500 text-red-900 placeholder-gray-400  focus:ring-red-500 focus:border-red-500 dark:focus:ring-red-500 dark:focus:border-red-500 dark:text-gray-900  dark:border-red-400 @else border-gray-300 dark:border-gray-600  dark:placeholder-gray-400 dark:text-white focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500 text-gray-900  @enderror"
                    type="file">
                @error('photo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
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
    </section>
</div>

