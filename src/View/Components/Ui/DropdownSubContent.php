<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownSubContent extends Component
{
    public $class;

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
        return view('bladecn::components.ui.dropdown-sub-content');
    }

    public function dropdownSubContentClasses()
    {
        return cn(
            'z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-lg',
            $this->class
        );
    }
}
