<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownCheckboxItem extends Component
{
    public $class;

    public $checked;

    /**
     * Create a new component instance.
     */
    public function __construct(string $class = '', bool $checked = false)
    {
        $this->class = $class;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.dropdown-checkbox-item');
    }

    public function dropdownCheckboxItemClasses()
    {
        return cn(
            'relative flex cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent',
            $this->class
        );
    }
}
