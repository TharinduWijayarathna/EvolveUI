<div {{ $attributes->merge(['class' => $dropdownRadioItemClasses()]) }}>
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        @if ($selected)
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="h-2 w-2 fill-current">
                <circle cx="12" cy="12" r="10" />
            </svg>
        @endif
    </span>
    {{ $slot }}
</div>
