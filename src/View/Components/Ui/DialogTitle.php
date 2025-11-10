<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DialogTitle extends Component
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
        return view('bladecn::components.ui.dialog-title');
    }

    public function titleClasses(): string
    {
        return cn(
            'text-lg font-semibold leading-none tracking-tight',
            $this->class
        );
    }
}
