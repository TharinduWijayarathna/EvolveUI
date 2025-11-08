<div class="flex flex-col gap-2" data-otp-container>
    {{-- Hidden combined input for form submission --}}
    <input type="hidden" name="{{ $name }}" value="{{ $value ?? '' }}" data-otp-hidden-input required>

    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>
</div>

@once
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const otpContainers = document.querySelectorAll('[data-otp-container]');

            otpContainers.forEach(container => {
                const inputs = container.querySelectorAll('[data-otp-slot]');
                const hidden = container.querySelector('[data-otp-hidden-input]');

                // Auto-fill hidden input and focus first empty slot
                const updateHidden = () => {
                    hidden.value = Array.from(inputs).map(i => i.value).join('');
                };

                const focusFirstEmpty = () => {
                    const firstEmpty = Array.from(inputs).find(i => i.value === '');
                    if (firstEmpty) firstEmpty.focus();
                };

                focusFirstEmpty();

                inputs.forEach((input, idx) => {
                    input.addEventListener('input', (e) => {
                        input.value = input.value.replace(/[^0-9]/g, ''); // digits only

                        if (input.value.length > 1) input.value = input.value.charAt(0);

                        // Move forward
                        if (input.value.length === 1 && idx < inputs.length - 1) {
                            inputs[idx + 1].focus();
                        }

                        updateHidden();
                    });

                    input.addEventListener('keydown', (e) => {
                        // Move backward on backspace
                        if (e.key === 'Backspace' && input.value === '' && idx > 0) {
                            inputs[idx - 1].focus();
                        }
                    });

                    // Handle paste
                    input.addEventListener('paste', (e) => {
                        e.preventDefault();
                        const paste = (e.clipboardData || window.clipboardData).getData(
                            'text');
                        const digits = paste.replace(/\D/g, '').slice(0, inputs.length);
                        digits.split('').forEach((char, i) => {
                            inputs[i].value = char;
                        });
                        updateHidden();

                        // Focus next empty or last
                        const nextEmpty = Array.from(inputs).find(i => i.value === '');
                        (nextEmpty || inputs[inputs.length - 1])
                        .focus();
                    });
                });
            });
        });
    </script>
@endonce
