<div class="{{ $cardClasses }}">
    @if ($header)
        {{ $header }}
    @elseif ($title || $action)
        <div class="px-4 py-2.5 flex justify-between items-center border-b dark:border-secondary-600">
            <h3 class="font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400">{{ $title }}</h3>

            @if ($action)
                {{ $action }}
            @endif
        </div>
    @endif

    <div {{ $attributes->merge(['class' => "{$padding} text-secondary-700 rounded-b-xl grow dark:text-secondary-400"]) }}>
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="{{ $footerClasses }}">
            {{ $footer }}
        </div>
    @endif
</div>
