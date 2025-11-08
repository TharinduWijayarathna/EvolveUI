@props([
    'id' => 'imageUpload',
    'name' => 'image',
    'label' => 'Image',
    'maxSizeMB' => 2,
    'class' => '',
])

<div class="grid gap-2 {{ $class }}">
    <x-ui.label :for="$id">{{ $label }}</x-ui.label>
    <div class="relative w-full">
        <div
            id="{{ $id }}Area"
            role="button"
            tabindex="0"
            class="relative flex min-h-44 flex-col items-center justify-center overflow-hidden rounded-xl border border-dashed border-input p-4 transition-colors hover:bg-accent/50 cursor-pointer"
            data-image-upload="{{ $id }}"
            data-max-size-mb="{{ $maxSizeMB }}"
        >
            <input type="file" id="{{ $id }}" name="{{ $name }}" accept="image/*" class="sr-only" aria-label="file-upload">
            <div id="{{ $id }}Preview" class="absolute inset-0 hidden">
                <img src="" alt="Uploaded preview" class="size-full object-cover">
            </div>
            <div id="{{ $id }}Content" class="flex flex-col items-center justify-center px-4 py-3 text-center">
                <div class="mb-2 flex size-11 shrink-0 items-center justify-center rounded-md border bg-background">
                    <x-icons.cloud-upload class="size-5 opacity-60" />
                </div>
                <p class="mb-1.5 text-sm font-normal">
                    <strong>Click to upload</strong> or drag and drop
                </p>
                <p class="text-xs text-muted-foreground">SVG, PNG, JPG or GIF (max. {{ $maxSizeMB }}MB)</p>
            </div>
            {{-- Edit button --}}
            <x-ui.button
                id="{{ $id }}EditButton"
                size="icon"
                variant="outline"
                class="absolute right-2 bottom-2 h-8 w-8 rounded-full hidden"
                aria-label="Edit image"
            >
                <x-icons.pencil class="h-4 w-4" />
            </x-ui.button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (function() {
        if (window.imageUploadInitialized) return;
        window.imageUploadInitialized = true;
        
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-image-upload]').forEach(function(container) {
                const id = container.getAttribute('data-image-upload');
                const maxSizeMB = parseInt(container.getAttribute('data-max-size-mb')) || 2;
                const fileInput = document.getElementById(id);
                const uploadArea = document.getElementById(id + 'Area');
                const preview = document.getElementById(id + 'Preview');
                const content = document.getElementById(id + 'Content');
                const editButton = document.getElementById(id + 'EditButton');
                const previewImg = preview.querySelector('img');
                
                if (!fileInput || !uploadArea || !preview || !content || !editButton) return;
                
                const maxSize = maxSizeMB * 1024 * 1024;
                
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
                    previewImg.src = objectUrl;
                    preview.classList.remove('hidden');
                    content.classList.add('hidden');
                    editButton.classList.remove('hidden');
                    uploadArea.classList.add('has-[img]:border-none');
                }
                
                fileInput.addEventListener('change', function(e) {
                    handleFileChange(e.target.files?.[0] ?? null);
                });
                
                uploadArea.addEventListener('click', openFileDialog);
                editButton.addEventListener('click', openFileDialog);
                
                // Drag and drop
                let isDragging = false;
                
                uploadArea.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = true;
                    uploadArea.classList.add('bg-accent/50');
                });
                
                uploadArea.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = false;
                    uploadArea.classList.remove('bg-accent/50');
                });
                
                uploadArea.addEventListener('drop', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    isDragging = false;
                    uploadArea.classList.remove('bg-accent/50');
                    handleFileChange(e.dataTransfer.files?.[0] ?? null);
                });
            });
        });
    })();
</script>
@endpush

