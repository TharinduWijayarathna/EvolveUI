<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownItem extends Component
{
    public ?string $class;

    public ?string $href;

    public string $method;

    public ?array $params;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $class = '',
        ?string $href = '#',
        string $method = 'get',
        ?array $params = null,
    ) {
        $this->class = $class;
        $this->href = $href;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.dropdown-item');
    }

    public function dropdownItemClasses()
    {
        return cn(
            'relative flex cursor-default select-none items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground hover:bg-accent hover:text-accent-foreground [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0',
            $this->class
        );
    }
}
