<div class="sheet-component">
    <!-- Trigger -->
    <div class="sheet-trigger">
        {{ $trigger ?? '' }}
    </div>

    <!-- Overlay -->
    <div class="sheet-overlay fixed inset-0 bg-black/80 z-50 opacity-0 hidden transition-opacity duration-300"></div>

    <!-- Content -->
    <div class="sheet-content {{ $contentClasses() }}">
        {{ $slot }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.sheet-component').forEach(sheet => {
            const trigger = sheet.querySelector('.sheet-trigger > *');
            const overlay = sheet.querySelector('.sheet-overlay');
            const content = sheet.querySelector('.sheet-content');

            const translateIn = '{{ $translateIn() }}';
            const translateOut = '{{ $translateOut() }}';

            function openSheet() {
                overlay.classList.remove('hidden');
                content.classList.remove('hidden');

                setTimeout(() => {
                    overlay.classList.add('opacity-100');
                    overlay.classList.remove('opacity-0');

                    content.classList.remove(translateOut);
                    content.classList.add(translateIn);
                }, 10);
            }

            function closeSheet() {
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');

                content.classList.remove(translateIn);
                content.classList.add(translateOut);

                setTimeout(() => {
                    overlay.classList.add('hidden');
                    content.classList.add('hidden');
                }, 300);
            }

            trigger?.addEventListener('click', openSheet);
            overlay?.addEventListener('click', closeSheet);

            content.querySelectorAll('[data-action="close-sheet"]').forEach(btn => {
                btn.addEventListener('click', closeSheet);
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
                    closeSheet();
                }
            });
        });
    });
</script>
