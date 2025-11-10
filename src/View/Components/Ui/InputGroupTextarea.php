<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupTextarea extends Component
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
        return view('bladecn::components.ui.input-group-textarea');
    }

    public function textareaClasses(): string
    {
        return cn(
            'flex-1 resize-none rounded-none border-0 bg-transparent py-3 shadow-none focus-visible:ring-0 dark:bg-transparent',
            $this->class
        );
    }
}
