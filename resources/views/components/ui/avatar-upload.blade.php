@props([
    'id' => 'avatar',
    'name' => 'avatar',
    'defaultUrl' => '',
    'fallbackText' => '',
    'maxSizeMB' => 2,
    'class' => '',
])

<div class="flex flex-col items-start gap-2 {{ $class }}" data-avatar-upload="{{ $id }}">
    <div class="relative inline-flex">
        <button
            type="button"
            id="{{ $id }}Button"
            class="relative flex size-16 items-center justify-center rounded-full border border-dashed border-input transition-colors outline-none hover:bg-accent/50 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50"
            data-has-image="{{ $defaultUrl ? 'true' : 'false' }}"
        >
            <input type="file" id="{{ $id }}" name="{{ $name }}" accept="image/*" class="sr-only" aria-label="file-upload">
            
            <div class="relative flex size-16 shrink-0 overflow-hidden rounded-full">
                <img id="{{ $id }}Image" src="{{ $defaultUrl }}" alt="{{ $fallbackText }}" class="{{ $defaultUrl ? '' : 'hidden' }} aspect-square h-full w-full object-cover">
                <div id="{{ $id }}Fallback" class="{{ $defaultUrl ? 'hidden' : '' }} flex h-full w-full items-center justify-center rounded-full bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                    {{ $fallbackText }}
                </div>
            </div>
        </button>
        
        <x-ui.button
            variant="secondary"
            type="button"
            size="sm"
            id="{{ $id }}EditButton"
            class="absolute -right-1 -bottom-1 h-6 w-6 rounded-full shadow-none p-0"
            aria-label="Change image"
        >
            <x-icons.pencil />
        </x-ui.button>
    </div>
</div>

@push('scripts')
<script>
    (function() {
        if (window.avatarUploadInitialized) return;
        window.avatarUploadInitialized = true;
        
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-avatar-upload]').forEach(function(container) {
                const id = container.getAttribute('data-avatar-upload');
                const maxSizeMB = {{ $maxSizeMB }};
                const maxSize = maxSizeMB * 1024 * 1024;
                const fileInput = document.getElementById(id);
                const button = document.getElementById(id + 'Button');
                const editButton = document.getElementById(id + 'EditButton');
                const image = document.getElementById(id + 'Image');
                const fallback = document.getElementById(id + 'Fallback');
                
                if (!fileInput || !button || !editButton || !image || !fallback) return;
                
                // Initialize border state if image exists
                function updateBorderState() {
                    const hasImage = image.src && !image.classList.contains('hidden');
                    if (hasImage) {
                        button.classList.remove('border', 'border-dashed', 'border-input');
                        button.setAttribute('data-has-image', 'true');
                    } else {
                        button.classList.add('border', 'border-dashed', 'border-input');
                        button.setAttribute('data-has-image', 'false');
                    }
                }
                
                // Check initial state
                updateBorderState();
                
                let isDragging = false;
                
                function openFileDialog() {
                    fileInput.click();
                }
                
                function handleFileChange(file) {
                    if (!file) return;
                    
                    if (!file.type.startsWith('image/')) {
                        alert('Only image files are supported');
                        return;
                    }
                    
                    if (file.size > maxSize) {
                        alert('File too large (max ' + maxSizeMB + 'MB)');
                        return;
                    }
                    
                    const objectUrl = URL.createObjectURL(file);
                    image.src = objectUrl;
                    image.classList.remove('hidden');
                    fallback.classList.add('hidden');
                    updateBorderState();
                }
                
                fileInput.addEventListener('change', function(e) {
                    handleFileChange(e.target.files?.[0] ?? null);
                });
                
                button.addEventListener('click', openFileDialog);
                editButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    openFileDialog();
                });
                
                // Drag and drop
                button.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = true;
                    button.classList.add('bg-accent/50');
                });
                
                button.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = false;
                    button.classList.remove('bg-accent/50');
                });
                
                button.addEventListener('drop', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = false;
                    button.classList.remove('bg-accent/50');
                    handleFileChange(e.dataTransfer.files?.[0] ?? null);
                });
            });
        });
    })();
</script>
@endpush

