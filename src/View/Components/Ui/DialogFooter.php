<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DialogFooter extends Component
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
        return view('evolveui::components.ui.dialog-footer');
    }

    public function footerClasses(): string
    {
        return cn(
            'flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2',
            $this->class
        );
    }
}
