<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemContent extends Component
{
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $class = '')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.item-content');
    }

    public function contentClasses(): string
    {
        return cn('flex flex-1 flex-col gap-1 [&+[data-slot=item-content]]:flex-none', $this->class);
    }
}
