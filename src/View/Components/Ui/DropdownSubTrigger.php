<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownSubTrigger extends Component
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
        return view('evolveui::components.ui.dropdown-sub-trigger');
    }

    public function dropdownSubTriggerClasses()
    {
        return cn(
            'flex cursor-default select-none items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-none focus:bg-accent bg-accent [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 pl-8',
            $this->class
        );
    }
}
