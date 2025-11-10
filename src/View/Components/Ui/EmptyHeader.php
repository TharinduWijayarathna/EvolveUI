<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyHeader extends Component
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
        return view('bladecn::components.ui.empty-header');
    }

    public function emptyHeaderClasses(): string
    {
        return cn(
            'flex max-w-sm flex-col items-center gap-2 text-center',
            $this->class,
        );
    }
}
