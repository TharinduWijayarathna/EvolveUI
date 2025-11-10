<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupButton extends Component
{
    public string $size;

    public string $variant;

    public string $type;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $size = 'xs', string $variant = 'ghost', string $type = 'button', ?string $class = null)
    {
        $this->size = $size;
        $this->variant = $variant;
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.input-group-button');
    }

    public function buttonClasses(): string
    {
        $sizes = [
            'xs' => '!h-6 !gap-1 !rounded-[calc(var(--radius)-5px)] !px-2 !has-[>svg]:px-2 ![&>svg:not([class*="size-"])]:size-3.5',
            'sm' => '!h-8 !gap-1.5 !rounded-md !px-2.5 !has-[>svg]:px-2.5',
            'icon-xs' => '!size-6 !rounded-[calc(var(--radius)-5px)] !p-0 !has-[>svg]:p-0',
            'icon-sm' => '!size-8 !p-0 !has-[>svg]:p-0',
        ];

        return cn(
            'flex items-center gap-2 text-sm shadow-none',
            $sizes[$this->size] ?? $sizes['xs'], // Default to 'xs' if size not found
            $this->class
        );
    }
}
