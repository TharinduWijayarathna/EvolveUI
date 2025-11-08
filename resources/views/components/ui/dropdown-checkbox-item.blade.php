<div {{ $attributes->merge(['class' => $dropdownCheckboxItemClasses()]) }}>
    <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
        @if ($checked)
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        @endif
    </span>
    {{ $slot }}
</div>
