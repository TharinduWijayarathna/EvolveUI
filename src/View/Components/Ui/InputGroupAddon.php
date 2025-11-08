<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupAddon extends Component
{
    public string $align;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $align = 'inline-start', ?string $class = null)
    {
        $this->align = $align;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.input-group-addon');
    }

    /**
     * Compute the full class string for the component.
     */
    public function addonClasses(): string
    {
        $base = 'text-muted-foreground flex h-auto cursor-text select-none items-center justify-center gap-2 py-1.5 text-sm font-medium group-data-[disabled=true]/input-group:opacity-50 [&>kbd]:rounded-[calc(var(--radius)-5px)] [&>svg:not([class*=\'size-\'])]:size-4';
        $variants = match ($this->align) {
            'inline-start' => 'order-first pl-3 has-[>button]:ml-[-0.45rem] has-[>kbd]:ml-[-0.35rem]',
            'inline-end' => 'order-last pr-3 has-[>button]:mr-[-0.4rem] has-[>kbd]:mr-[-0.35rem]',
            'block-start' => '[.border-b]:pb-3 order-first w-full justify-start px-3 pt-3 group-has-[>input]/input-group:pt-2.5',
            'block-end' => '[.border-t]:pt-3 order-last w-full justify-start px-3 pb-3 group-has-[>input]/input-group:pb-2.5',
            default => '',
        };

        return cn($base, $variants, $this->class);
    }
}
