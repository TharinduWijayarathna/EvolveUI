<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvatarImage extends Component
{
    public $src;

    public $alt;

    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $src = '', string $alt = '', string $class = '')
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = trim($class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.avatar-image');
    }

    public function imageClasses(): string
    {
        return cn('aspect-square h-full w-full', $this->class);
    }
}
