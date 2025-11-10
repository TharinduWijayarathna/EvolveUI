<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroup extends Component
{
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $class = null)
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.input-group');
    }

    public function groupClasses(): string
    {
        return cn(
            'flex h-9 w-full items-center rounded-md border border-input bg-transparent shadow-xs transition-[color,box-shadow] outline-none focus-within:border-ring focus-within:ring-ring/50 focus-within:ring-[3px]',
            $this->class
        );
    }
}
