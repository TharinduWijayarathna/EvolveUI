<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupText extends Component
{
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $class = null)
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.input-group-text');
    }

    /**
     * Compute the full class string for the component.
     */

    public function textClasses(): string
    {
        return cn(
            'text-muted-foreground flex items-center gap-2 text-sm [&_svg:not([class*="size-"])]:size-4 [&_svg]:pointer-events-none',
            $this->class
        );
    }
}
