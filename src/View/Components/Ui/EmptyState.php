<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyState extends Component
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
        return view('bladecn::components.ui.empty-state');
    }

    public function emptyClasses(): string
    {
        return cn(
            'flex min-w-0 flex-1 flex-col items-center justify-center gap-6 text-balance rounded-lg border-dashed p-6 text-center md:p-12',
            $this->class,
        );
    }
}
