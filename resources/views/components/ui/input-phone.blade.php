@props([
    'id' => 'phone',
    'defaultCountry' => 'lk',
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('w-full', $class)]) }}>
    <input type="tel" id="{{ $id }}" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" placeholder="Phone number" />
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.0.2/build/css/intlTelInput.css">
<style>
    .iti {
        width: 100%;
    }

    .iti__selected-flag,
    .iti__selected-dial-code,
    .iti input {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }
    
    /* Flag selector with border */
    .iti__selected-flag {
        border: 1px solid hsl(var(--input)) !important;
        border-right: none !important;
        border-radius: 0.375rem 0 0 0.375rem !important;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
    }
    
    .iti__selected-flag:hover {
        background: hsl(var(--accent)) !important;
    }
    
    /* Input field - ensure border is visible */
    #{{ $id }} {
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
    }
    
    #{{ $id }}:focus {
        border-color: hsl(var(--ring)) !important;
        border-left: none !important;
        box-shadow: 0 0 0 3px hsl(var(--ring) / 0.5), 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
    }
    
    /* Fix search input padding */
    .iti__search-box {
        padding: 0.75rem !important;
    }
    
    .iti__search-input {
        padding: 0.5rem 0.75rem !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.0.2/build/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInput = document.getElementById('{{ $id }}');
        if (phoneInput && window.intlTelInput) {
            window.intlTelInput(phoneInput, {
                initialCountry: '{{ $defaultCountry }}',
                separateDialCode: true,
                utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.0.2/build/js/utils.js',
            });
            
            // Change search placeholder after initialization
            setTimeout(function() {
                const searchInput = phoneInput.closest('.iti')?.querySelector('.iti__search-input');
                if (searchInput) {
                    searchInput.placeholder = 'Search country...';
                }
            }, 100);
        }
    });
</script>
@endpush

