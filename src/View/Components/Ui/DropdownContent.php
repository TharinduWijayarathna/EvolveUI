<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownContent extends Component
{
    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $class = '')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.dropdown-content');
    }

    public function dropdownContentClasses()
    {
        return cn(
            'z-50 min-w-[8rem] overflow-y-auto overflow-x-hidden rounded-md border-0 bg-popover p-1 text-popover-foreground shadow-md',
            $this->class
        );
    }
}
