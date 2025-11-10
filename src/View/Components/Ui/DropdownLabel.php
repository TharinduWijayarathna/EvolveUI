<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownLabel extends Component
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
        return view('bladecn::components.ui.dropdown-label');
    }

    public function dropdownLabelClasses()
    {
        return cn(
            'px-2 py-1.5 text-sm font-semibold',
            $this->class
        );
    }
}
