<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputError extends Component
{
    public ?string $message;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $message = null, ?string $class = null)
    {
        $this->message = $message;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.input-error');
    }

    /**
     * Compute the class string.
     */
    public function errorClasses(): string
    {
        return cn('text-sm text-red-600 dark:text-red-400', $this->class);
    }
}
