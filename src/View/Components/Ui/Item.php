<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public string $variant;

    public string $size;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'default', string $size = 'default', string $class = '')
    {
        $this->variant = $variant;
        $this->size = $size;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.item');
    }

    public function itemClasses(): string
    {
        $base = 'flex flex-wrap items-center rounded-md border border-transparent text-sm outline-none transition-colors duration-100 focus-visible:ring-[3px]';
        $variants = [
            'default' => 'bg-transparent',
            'outline' => 'border-border',
            'muted' => 'bg-muted/50',
        ];
        $sizes = [
            'default' => 'gap-4 p-4',
            'sm' => 'gap-2.5 px-4 py-3',
        ];

        return cn(
            $base,
            $variants[$this->variant],
            $sizes[$this->size],
            $this->class
        );
    }
}
