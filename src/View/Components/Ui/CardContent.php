<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardContent extends Component
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
        return view('bladecn::components.ui.card-content');
    }

    public function contentClasses(): string
    {
        return cn('px-6', $this->class);
    }
}
