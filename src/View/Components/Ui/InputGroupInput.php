<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupInput extends Component
{
    public ?string $type;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $type = 'text', ?string $class = null)
    {
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.input-group-input');
    }

    public function inputClasses(): string
    {
        return cn(
            'file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground h-full w-full min-w-0 border-0 bg-transparent px-3 py-1 text-base shadow-none outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
            $this->class
        );
    }
}
