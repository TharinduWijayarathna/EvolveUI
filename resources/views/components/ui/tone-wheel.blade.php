@props([
    'class' => '',
])

@php
    $uniqueId = uniqid('tone-wheel-');
@endphp

<x-ui.card class="relative aspect-square w-full rounded-xl border-0 p-2 {{ $class }}" style="background: linear-gradient(122.13deg, #69BFF9 0.4%, #B96AF3 30.35%, #E9685E 71.13%, #F2AC3E 100.4%);">
    <x-ui.card-content id="{{ $uniqueId }}-content" class="relative h-full w-full cursor-pointer rounded-xl bg-card shadow-md">
        {{-- Quadrant Highlights --}}
        <div id="{{ $uniqueId }}-quadrant-top-left" class="absolute top-0 left-0 h-1/2 w-1/2 rounded-tl-xl transition"></div>
        <div id="{{ $uniqueId }}-quadrant-top-right" class="absolute top-0 right-0 h-1/2 w-1/2 rounded-tr-xl transition"></div>
        <div id="{{ $uniqueId }}-quadrant-bottom-left" class="absolute bottom-0 left-0 h-1/2 w-1/2 rounded-bl-xl transition"></div>
        <div id="{{ $uniqueId }}-quadrant-bottom-right" class="absolute right-0 bottom-0 h-1/2 w-1/2 rounded-br-xl transition"></div>

        {{-- Axes --}}
        <div class="absolute top-1/2 left-0 h-px w-full -translate-y-1/2 bg-border"></div>
        <div class="absolute top-0 left-1/2 h-full w-px -translate-x-1/2 bg-border"></div>

        {{-- Center marker --}}
        <div class="absolute top-1/2 left-1/2 h-8 w-8 -translate-x-1/2 -translate-y-1/2 rounded-full border border-border bg-card"></div>

        {{-- Preview Knob (lighter shade for hover) --}}
        <div id="{{ $uniqueId }}-preview" class="pointer-events-none absolute hidden h-5 w-5 rounded-full bg-gradient-to-br from-primary/30 via-purple-500/30 to-orange-400/30 ring-2 ring-background/50 sm:h-6 sm:w-6" style="left: 50%; top: 50%; transform: translate(-50%, -50%);"></div>
        
        {{-- Actual Knob (set on click) with backdrop --}}
        <div id="{{ $uniqueId }}-knob" class="pointer-events-none absolute h-5 w-5 rounded-full bg-white/95 shadow-lg ring-2 ring-background dark:bg-gray-900/95 sm:h-6 sm:w-6" style="left: 50%; top: 50%; transform: translate(-50%, -50%);">
            {{-- Gradient overlay with blend mode for vibrant color --}}
            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-primary via-purple-500 to-orange-400 opacity-90"></div>
        </div>

        {{-- Labels with blend mode for color inversion --}}
        <span class="absolute top-1/4 left-1/4 -translate-x-1/2 -translate-y-1/2 text-xs font-medium text-muted-foreground sm:text-sm md:text-base" style="mix-blend-mode: difference;">Catchy</span>
        <span class="absolute top-1/4 right-1/4 translate-x-1/2 -translate-y-1/2 text-xs font-medium text-muted-foreground sm:text-sm md:text-base" style="mix-blend-mode: difference;">Professional</span>
        <span class="absolute bottom-1/4 left-1/4 -translate-x-1/2 translate-y-1/2 text-xs font-medium text-muted-foreground sm:text-sm md:text-base" style="mix-blend-mode: difference;">Informative</span>
        <span class="absolute right-1/4 bottom-1/4 translate-x-1/2 translate-y-1/2 text-xs font-medium text-muted-foreground sm:text-sm md:text-base" style="mix-blend-mode: difference;">Empower</span>
    </x-ui.card-content>

    {{-- Hidden canvas for color detection --}}
    <canvas id="{{ $uniqueId }}-canvas" class="hidden"></canvas>
</x-ui.card>

@push('scripts')
<script>
    (function() {
        const QUADRANT_LABELS = {
            topLeft: 'Catchy',
            topRight: 'Professional',
            bottomLeft: 'Informative',
            bottomRight: 'Empower',
        };

        const cardRef = document.getElementById('{{ $uniqueId }}-content');
        const canvas = document.getElementById('{{ $uniqueId }}-canvas');
        const knob = document.getElementById('{{ $uniqueId }}-knob');
        const preview = document.getElementById('{{ $uniqueId }}-preview');
        const quadrantElements = {
            topLeft: document.getElementById('{{ $uniqueId }}-quadrant-top-left'),
            topRight: document.getElementById('{{ $uniqueId }}-quadrant-top-right'),
            bottomLeft: document.getElementById('{{ $uniqueId }}-quadrant-bottom-left'),
            bottomRight: document.getElementById('{{ $uniqueId }}-quadrant-bottom-right'),
        };
        
        let selectedQuadrant = null;
        let pos = { x: 0, y: 0 }; // Actual knob position (set on click)
        let previewPos = { x: 0, y: 0 }; // Preview position (on hover)

        // Setup canvas and initialize position
        function resizeCanvas() {
            if (!cardRef || !canvas) return;
            const rect = cardRef.getBoundingClientRect();
            canvas.width = rect.width;
            canvas.height = rect.height;

            // Center knob
            pos.x = rect.width / 2;
            pos.y = rect.height / 2;
            updateKnobPosition();

            // Gradient fill
            const ctx = canvas.getContext('2d');
            if (!ctx) return;
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            gradient.addColorStop(0.004, '#69BFF9');
            gradient.addColorStop(0.3035, '#B96AF3');
            gradient.addColorStop(0.7113, '#E9685E');
            gradient.addColorStop(1, '#F2AC3E');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        function updateKnobPosition() {
            if (!knob) return;
            knob.style.left = `${pos.x}px`;
            knob.style.top = `${pos.y}px`;
        }

        function updatePreviewPosition() {
            if (!preview) return;
            preview.style.left = `${previewPos.x}px`;
            preview.style.top = `${previewPos.y}px`;
        }

        function getQuadrantClass(quadrant) {
            return selectedQuadrant === quadrant ? 'bg-accent/40' : '';
        }

        function updateQuadrantHighlights() {
            quadrantElements.topLeft.className = `absolute top-0 left-0 h-1/2 w-1/2 rounded-tl-xl transition ${getQuadrantClass(QUADRANT_LABELS.topLeft)}`;
            quadrantElements.topRight.className = `absolute top-0 right-0 h-1/2 w-1/2 rounded-tr-xl transition ${getQuadrantClass(QUADRANT_LABELS.topRight)}`;
            quadrantElements.bottomLeft.className = `absolute bottom-0 left-0 h-1/2 w-1/2 rounded-bl-xl transition ${getQuadrantClass(QUADRANT_LABELS.bottomLeft)}`;
            quadrantElements.bottomRight.className = `absolute right-0 bottom-0 h-1/2 w-1/2 rounded-br-xl transition ${getQuadrantClass(QUADRANT_LABELS.bottomRight)}`;
        }

        function snapToGrid(x, y, width, height) {
            // 5x5 grid total = 25 snap points
            const gridSize = 4; // 4 divisions create 5 points (0, 1, 2, 3, 4)
            const cellWidth = width / gridSize;
            const cellHeight = height / gridSize;
            
            // Find nearest grid point
            const gridX = Math.round(x / cellWidth) * cellWidth;
            const gridY = Math.round(y / cellHeight) * cellHeight;
            
            return { x: gridX, y: gridY };
        }

        function handleMouseMove(e) {
            if (!cardRef || !preview) return;
            const rect = cardRef.getBoundingClientRect();
            const rawX = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
            const rawY = Math.max(0, Math.min(e.clientY - rect.top, rect.height));
            
            // Snap to nearest grid point for preview
            const snapped = snapToGrid(rawX, rawY, rect.width, rect.height);
            previewPos.x = snapped.x;
            previewPos.y = snapped.y;
            
            // Show preview
            preview.classList.remove('hidden');
            updatePreviewPosition();
        }

        function handleMouseLeave() {
            if (!preview) return;
            // Hide preview when mouse leaves
            preview.classList.add('hidden');
        }

        function handleClick(e) {
            if (!cardRef || !canvas) return;
            const rect = cardRef.getBoundingClientRect();
            const rawX = e.clientX - rect.left;
            const rawY = e.clientY - rect.top;
            
            // Snap to nearest grid point
            const snapped = snapToGrid(rawX, rawY, rect.width, rect.height);
            const clickX = snapped.x;
            const clickY = snapped.y;

            // Set actual knob position
            pos.x = clickX;
            pos.y = clickY;
            updateKnobPosition();

            // Determine quadrant
            let label;
            if (clickX < rect.width / 2 && clickY < rect.height / 2) label = QUADRANT_LABELS.topLeft;
            else if (clickX >= rect.width / 2 && clickY < rect.height / 2) label = QUADRANT_LABELS.topRight;
            else if (clickX < rect.width / 2 && clickY >= rect.height / 2) label = QUADRANT_LABELS.bottomLeft;
            else label = QUADRANT_LABELS.bottomRight;

            selectedQuadrant = label;
            updateQuadrantHighlights();

            // Get gradient color from canvas
            const ctx = canvas.getContext('2d');
            if (!ctx) return;
            const pixel = ctx.getImageData(Math.floor(clickX), Math.floor(clickY), 1, 1).data;
            const color = `rgb(${pixel[0]}, ${pixel[1]}, ${pixel[2]})`;
            console.log('Selected tone:', label, 'Color:', color, 'Position:', { x: clickX, y: clickY });
        }

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        if (cardRef) {
            cardRef.addEventListener('mousemove', handleMouseMove);
            cardRef.addEventListener('mouseleave', handleMouseLeave);
            cardRef.addEventListener('click', handleClick);
        }
    })();
</script>
@endpush

