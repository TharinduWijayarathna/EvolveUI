<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupAddon extends Component
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
        return view('bladecn::components.ui.input-group-addon');
    }

    public function addonClasses(): string
    {
        return cn(
            'flex items-center justify-center px-3 text-muted-foreground [&>svg]:size-4',
            $this->class
        );
    }
}
