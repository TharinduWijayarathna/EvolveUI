<div class="tooltip-wrapper relative inline-block" data-tooltip-side="{{ $side }}">
    {{ $slot }}

    <div class="tooltip-content {{ $tooltipClasses() }}" style="margin: {{ $sideOffset }}px;" role="tooltip">
        {{ $attributes->get('content') }}
    </div>
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.tooltip-wrapper').forEach(wrapper => {
                const trigger = wrapper.firstElementChild;
                const content = wrapper.querySelector('.tooltip-content');
                const side = wrapper.dataset.tooltipSide || 'top';
                const offset = parseInt(content.style.margin) || 4;

                function positionTooltip() {
                    const rect = trigger.getBoundingClientRect();
                    const scrollX = window.scrollX || window.pageXOffset;
                    const scrollY = window.scrollY || window.pageYOffset;

                    content.style.opacity = 1;
                    content.style.pointerEvents = 'auto';

                    switch (side) {
                        case 'top':
                            content.style.left =
                                `${rect.left + scrollX + rect.width/2 - content.offsetWidth/2}px`;
                            content.style.top = `${rect.top + scrollY - content.offsetHeight - offset}px`;
                            break;
                        case 'bottom':
                            content.style.left =
                                `${rect.left + scrollX + rect.width/2 - content.offsetWidth/2}px`;
                            content.style.top = `${rect.bottom + scrollY + offset}px`;
                            break;
                        case 'left':
                            content.style.left = `${rect.left + scrollX - content.offsetWidth - offset}px`;
                            content.style.top =
                                `${rect.top + scrollY + rect.height/2 - content.offsetHeight/2}px`;
                            break;
                        case 'right':
                            content.style.left = `${rect.right + scrollX + offset}px`;
                            content.style.top =
                                `${rect.top + scrollY + rect.height/2 - content.offsetHeight/2}px`;
                            break;
                    }
                }

                trigger.addEventListener('mouseenter', () => {
                    positionTooltip();
                    content.classList.add('opacity-100');
                });
                trigger.addEventListener('mouseleave', () => {
                    content.classList.remove('opacity-100');
                });
            });
        });
    </script>
@endPushOnce
