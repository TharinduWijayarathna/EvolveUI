<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownRadioItem extends Component
{
    public $class;

    public $selected;

    /**
     * Create a new component instance.
     */
    public function __construct(string $class = '', bool $selected = false)
    {
        $this->class = $class;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.dropdown-radio-item');
    }

    public function dropdownRadioItemClasses()
    {
        return cn(
            'relative flex cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent',
            $this->class
        );
    }
}
