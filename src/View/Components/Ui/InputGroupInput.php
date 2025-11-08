<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputGroupInput extends Component
{
    public ?string $class;

    public ?string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $class = null, ?string $type = 'text')
    {
        $this->class = $class;
        $this->type = $type;
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
            '!flex-1 !rounded-none !border-0 !bg-transparent !shadow-none !ring-0 !focus-visible:ring-0 !dark:bg-transparent',
            $this->class
        );
    }
}
