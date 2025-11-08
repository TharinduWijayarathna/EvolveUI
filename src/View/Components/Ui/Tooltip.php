<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tooltip extends Component
{
    public ?string $side;
    public ?int $sideOffset;
    public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $side = 'top', ?int $sideOffset = 4, string $class = '')
    {
        $this->side = $side;
        $this->sideOffset = $sideOffset ?? 4;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.tooltip');
    }

    public function tooltipClasses(): string
    {
        return cn(
            "z-50 overflow-hidden rounded-md border bg-popover px-3 py-1.5 text-sm text-popover-foreground shadow-md",
            "transition-opacity duration-150 ease-in-out opacity-0 pointer-events-none",
            $this->class
        );
    }
}
