<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownShortcut extends Component
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
        return view('evolveui::components.ui.dropdown-shortcut');
    }

    public function dropdownShortcutClasses()
    {
        return cn(
            'ml-auto text-xs tracking-widest opacity-60',
            $this->class
        );
    }
}
