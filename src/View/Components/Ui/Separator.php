<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Separator extends Component
{
    public string $orientation;

    public bool $decorative;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $orientation = 'horizontal', bool $decorative = true, ?string $class = null)
    {
        $this->orientation = $orientation;
        $this->decorative = $decorative;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.separator');
    }

    public function separatorClasses(): string
    {
        $base = 'shrink-0 bg-border';
        $orientationClass = $this->orientation === 'horizontal' ? 'h-[1px] w-full' : 'h-full w-[1px]';

        return cn($base, $orientationClass, $this->class);
    }
}
