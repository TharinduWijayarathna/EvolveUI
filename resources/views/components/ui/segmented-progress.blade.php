@props([
    'initialProgress' => 37,
    'segments' => 50,
    'animateToEnd' => true,
    'animationDelay' => 500,
    'animationSpeed' => 100,
    'showBadge' => true,
])

@php
    $uniqueId = uniqid('segmented-progress-');
@endphp

<div class="flex w-full flex-col gap-2 sm:flex-row sm:items-center">
    <div id="{{ $uniqueId }}-segments" class="flex flex-1 gap-[0.125rem]"></div>
    @if($showBadge)
        <x-ui.badge class="self-start whitespace-nowrap font-mono text-xs font-semibold" style="height: clamp(1.25rem, 2.5vw, 3rem); font-size: clamp(0.625rem, 1vw, 0.8rem);">
            <span id="{{ $uniqueId }}-value">{{ $initialProgress }}</span>%
        </x-ui.badge>
    @endif
</div>

@push('scripts')
<script>
    (function() {
        // Segmented progress bar
        const segments = {{ $segments }};
        let progress = {{ $initialProgress }};
        const container = document.getElementById('{{ $uniqueId }}-segments');
        const progressValueEl = document.getElementById('{{ $uniqueId }}-value');

        function lerpColor(color1, color2, t) {
            return color1.map((c, i) => Math.round(c + (color2[i] - c) * t));
        }

        function renderSegments() {
            const filledSegments = Math.round((progress / 100) * segments);
            container.innerHTML = '';

            for (let i = 0; i < segments; i++) {
                const t = i / (segments - 1);
                let segmentColorArray;
                
                if (t < 0.33) {
                    segmentColorArray = lerpColor([255, 78, 0], [177, 107, 62], t / 0.33);
                } else if (t < 0.66) {
                    segmentColorArray = lerpColor([177, 107, 62], [0, 234, 255], (t - 0.33) / 0.33);
                } else {
                    segmentColorArray = [0, 234, 255];
                }

                const segmentColor = `rgb(${segmentColorArray.join(',')})`;
                const isFilled = i < filledSegments;

                const segment = document.createElement('div');
                segment.className = `transform rounded-md transition-all duration-300 ease-in-out ${isFilled ? 'hover:scale-110 hover:shadow-lg' : 'bg-secondary'}`;
                segment.style.width = `${100 / segments}%`;
                segment.style.height = 'clamp(1.25rem, 2.5vw, 3rem)';
                if (isFilled) {
                    segment.style.background = segmentColor;
                }
                container.appendChild(segment);
            }
        }

        renderSegments();

        @if($animateToEnd)
        // Animate progress to 100%
        setTimeout(() => {
            const interval = setInterval(() => {
                if (progress < 100) {
                    progress++;
                    if (progressValueEl) {
                        progressValueEl.textContent = progress;
                    }
                    renderSegments();
                } else {
                    clearInterval(interval);
                }
            }, {{ $animationSpeed }});
        }, {{ $animationDelay }});
        @endif
    })();
</script>
@endpush

