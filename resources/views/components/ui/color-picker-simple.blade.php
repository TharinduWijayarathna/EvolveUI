@props([
    'id' => 'colorPicker',
    'name' => 'color',
    'label' => 'Color',
    'value' => '#000000',
    'class' => '',
])

<div class="flex h-full flex-col gap-2 {{ $class }}" data-color-picker="{{ $id }}">
    <x-ui.label :for="$id">{{ $label }}</x-ui.label>
    <div
        id="{{ $id }}Swatch"
        class="h-full min-h-20 w-full cursor-pointer rounded-lg"
        style="background-color: {{ $value }};"
        onclick="document.getElementById('{{ $id }}Input').click()"
    ></div>
    <input type="color" id="{{ $id }}Input" class="sr-only" value="{{ $value }}">
    <div class="relative">
        <x-ui.input
            :id="$id"
            name="{{ $name }}"
            type="text"
            class="peer ps-12 pe-6 uppercase"
            value="{{ $value }}"
        />
        <span class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3 text-sm text-muted-foreground peer-disabled:opacity-50">
            HEX
        </span>
    </div>
</div>

@push('scripts')
<script>
    (function() {
        if (window.colorPickerInitialized) return;
        window.colorPickerInitialized = true;
        
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-color-picker]').forEach(function(container) {
                const id = container.getAttribute('data-color-picker');
                const colorInput = document.getElementById(id + 'Input');
                const colorSwatch = document.getElementById(id + 'Swatch');
                const colorText = document.getElementById(id);

                if (!colorInput || !colorSwatch || !colorText) return;

                colorInput.addEventListener('input', function(e) {
                    const color = e.target.value.toUpperCase();
                    colorSwatch.style.backgroundColor = color;
                    colorText.value = color;
                });

                colorText.addEventListener('input', function(e) {
                    const color = e.target.value.toUpperCase();
                    if (/^#[0-9A-F]{6}$/.test(color)) {
                        colorInput.value = color;
                        colorSwatch.style.backgroundColor = color;
                    }
                });
            });
        });
    })();
</script>
@endpush


