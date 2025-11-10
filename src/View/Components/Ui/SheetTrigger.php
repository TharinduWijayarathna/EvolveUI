<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SheetTrigger extends Component
{
    public string $class;

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
        return view('bladecn::components.ui.sheet-trigger');
    }

    /**
     * Returns Tailwind classes for the trigger.
     */
    public function sheetTriggerClasses(): string
    {
        return cn('inline-flex items-center justify-center', $this->class);
    }
}
