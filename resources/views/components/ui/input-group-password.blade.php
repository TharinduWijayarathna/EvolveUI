@php
    // Get the user's ID or generate one
    $inputId = $attributes->get('id', 'password_' . uniqid());
    // Generate unique IDs for the icons to avoid conflicts with multiple password fields
    $iconSuffix = uniqid();
@endphp

<x-ui.input 
    type="password" 
    data-slot="input-group-control" 
    {{ $attributes->merge(['class' => $inputClasses()]) }} />

<button
    type="button"
    onclick="togglePasswordVisibility('{{ $inputId }}', '{{ $iconSuffix }}')"
    class="absolute inset-y-0 right-0 flex items-center pr-3 text-muted-foreground hover:text-foreground transition-colors cursor-pointer z-10 pointer-events-auto">
    <x-icons.eye id="eye_{{ $iconSuffix }}" />
    <x-icons.eye-off class="hidden" id="eye_off_{{ $iconSuffix }}" />
</button>

@once
    @push('scripts')
        <script>
            function togglePasswordVisibility(inputId, iconSuffix) {
                const input = document.getElementById(inputId);
                const eyeIcon = document.getElementById('eye_' + iconSuffix);
                const eyeOffIcon = document.getElementById('eye_off_' + iconSuffix);
                
                if (!input) {
                    console.error('Input not found:', inputId);
                    return;
                }
                
                if (input.type === 'password') {
                    input.type = 'text';
                    eyeIcon.classList.add('hidden');
                    eyeOffIcon.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eyeIcon.classList.remove('hidden');
                    eyeOffIcon.classList.add('hidden');
                }
            }
        </script>
    @endpush
@endonce

