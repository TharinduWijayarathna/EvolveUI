<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemTitle extends Component
{
    public ?string $class;

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
        return view('bladecn::components.ui.item-title');
    }

    public function titleClasses(): string
    {
        return cn('flex w-fit items-center gap-2 text-sm font-medium leading-snug', $this->class);
    }
}
