<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
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
        return view('evolveui::components.ui.card');
    }

    public function cardClasses(): string
    {
        return cn(
            'bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm',
            $this->class
        );
    }
}
