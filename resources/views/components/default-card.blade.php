<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <section class="max-w-xl">
        @if($hasCardTitle ?? '')
        <div class="flex gap-3 mb-2">
            <div>
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $cardTitle ?? ''}}
                </h5>
            </div>
        </div>
        @endif
        @if($cardDescription ?? '')
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            {{ $cardDescription}}
        </p>
        @endif
        {{ $slot }}
    </section>
</div>
