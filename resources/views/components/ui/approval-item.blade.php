@props([
    'title' => '',
    'time' => '',
    'images' => [], // Array of image URLs
    'href' => '#',
])

<div class="flex items-center justify-between gap-2 rounded-xl p-3 transition hover:bg-muted/50">
    {{-- Stacked Images --}}
    <div class="relative flex h-14 w-14 flex-shrink-0">
        @foreach($images as $index => $image)
            <img 
                src="{{ $image }}" 
                alt="{{ $title }}"
                class="absolute h-14 w-14 rounded-xl border object-cover shadow-sm transition-transform duration-200"
                style="left: {{ $index * 8 }}px; z-index: {{ count($images) - $index }};"
            />
        @endforeach
    </div>

    {{-- Content --}}
    <div class="ml-4 flex-1 px-3">
        <h3 class="line-clamp-1 text-sm font-semibold text-foreground">{{ $title }}</h3>
        <div class="mt-1 flex items-center text-xs text-muted-foreground">
            <x-icons.time-schedule class="mr-1 h-4 w-4" />
            {{ $time }}
        </div>
    </div>

    {{-- Action Button --}}
    <x-ui.button tag="a" :href="$href" variant="outline" size="sm" class="cursor-default">
        View <x-icons.arrow-up-right class="h-4 w-4" />
    </x-ui.button>
</div>

