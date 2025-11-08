<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyContent extends Component
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
        return view('evolveui::components.ui.empty-content');
    }

    public function emptyContentClasses(): string
    {
        return cn(
            'flex w-full min-w-0 max-w-sm flex-col items-center gap-4 text-balance text-sm',
            $this->class,
        );
    }
}
