@props([
    'name' => 'radio-group',
    'options' => [],
    'defaultValue' => '',
    'class' => '',
    'showRadio' => true,
    'variant' => 'default', // 'default' or 'invisible'
    'textSize' => 'small', // 'small' or 'default'
])

@php
    $groupId = uniqid('radio-group-');
    $hideRadio = ($variant === 'invisible') || !$showRadio;
    $itemClass = $hideRadio 
        ? 'relative flex w-full max-w-md items-start gap-2 rounded-md border-[1.5px] border-input p-4 shadow-xs outline-none transition-all hover:border-primary/30 has-[:checked]:border-primary'
        : 'group relative flex cursor-pointer flex-col gap-2 rounded-lg border p-4 transition hover:border-primary has-[:checked]:border-primary has-[:checked]:bg-accent';
    $radioClass = $hideRadio
        ? 'order-1 opacity-0'
        : 'size-4 border-gray-300 text-primary focus:ring-primary';
    $gapClass = $hideRadio ? 'gap-2' : 'gap-4';
@endphp

<div class="flex w-full flex-col {{ $gapClass }} {{ $class }}" data-radio-group="{{ $groupId }}">
    @foreach($options as $index => $option)
        @php
            $optionValue = is_array($option) ? ($option['value'] ?? $option) : $option;
            $optionLabel = is_array($option) ? ($option['label'] ?? $option['value'] ?? $option) : $option;
            $optionDescription = is_array($option) ? ($option['description'] ?? null) : null;
            $optionIcon = is_array($option) ? ($option['icon'] ?? null) : null;
            $optionId = $groupId . '-' . $index;
            $isChecked = $defaultValue === $optionValue;
        @endphp
        <label class="{{ $itemClass }} cursor-pointer" for="{{ $optionId }}">
            <input 
                type="radio" 
                name="{{ $name }}" 
                id="{{ $optionId }}" 
                value="{{ $optionValue }}"
                {{ $isChecked ? 'checked' : '' }}
                class="{{ $radioClass }}"
                style="{{ $hideRadio ? 'position: absolute; inset: 0; pointer-events: none;' : '' }}"
                onchange="updateRadioGroupSelection('{{ $groupId }}')"
            />
            @if($hideRadio && $optionIcon)
                <div class="flex grow items-start gap-3">
                    <div class="shrink-0">{!! $optionIcon !!}</div>
                    <div class="grid grow gap-2">
                        <span class="{{ $textSize === 'default' ? 'font-medium' : 'text-sm font-medium' }}">{{ $optionLabel }}</span>
                        @if($optionDescription)
                            <p class="{{ $textSize === 'default' ? 'text-sm' : 'text-xs' }} text-muted-foreground">{{ $optionDescription }}</p>
                        @endif
                    </div>
                </div>
            @else
                @if($hideRadio)
                    <div class="grid grow gap-2">
                        <span class="{{ $textSize === 'default' ? 'font-medium' : 'text-sm' }}">{{ $optionLabel }}</span>
                        @if($optionDescription)
                            <p class="{{ $textSize === 'default' ? 'text-sm' : 'text-xs' }} text-muted-foreground">{{ $optionDescription }}</p>
                        @endif
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <span class="font-medium">{{ $optionLabel }}</span>
                    </div>
                    @if($optionDescription)
                        <p class="text-sm text-muted-foreground">{{ $optionDescription }}</p>
                    @endif
                @endif
            @endif
        </label>
    @endforeach
</div>

@push('scripts')
<script>
    function updateRadioGroupSelection(groupId) {
        const group = document.querySelector(`[data-radio-group="${groupId}"]`);
        if (!group) return;
        
        // Remove checked state from all labels
        group.querySelectorAll('label').forEach(label => {
            label.classList.remove('border-primary', 'bg-accent', 'bg-accent/50', 'border-primary/50');
        });
        
        // Add checked state to selected label
        const checked = group.querySelector('input:checked');
        if (checked) {
            const label = checked.closest('label');
            // Check if it's invisible variant
            if (checked.classList.contains('opacity-0')) {
                label?.classList.add('border-primary');
            } else {
                label?.classList.add('border-primary', 'bg-accent');
            }
        }
    }
    
    // Initialize checked state on page load
    document.querySelectorAll('[data-radio-group]').forEach(group => {
        const checked = group.querySelector('input:checked');
        if (checked) {
            const label = checked.closest('label');
            // Check if it's invisible variant
            if (checked.classList.contains('opacity-0')) {
                label?.classList.add('border-primary');
            } else {
                label?.classList.add('border-primary', 'bg-accent');
            }
        }
    });
</script>
@endpush


