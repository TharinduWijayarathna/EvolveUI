<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvatarFallback extends Component
{
    public $name;

    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name = '', string $class = '')
    {
        $this->name = $name;
        $this->class = trim($class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.avatar-fallback');
    }

    public function fallbackClasses(): string
    {
        return cn(
            'flex h-full w-full items-center justify-center rounded-full bg-muted',
            $this->class
        );
    }

    public function initials(): string
    {
        return getInitials($this->name);
    }
}
