<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyMedia extends Component
{
    public string $variant;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'default', ?string $class = null)
    {
        $this->variant = $variant;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.empty-media');
    }

    public function emptyMediaClasses(): string
    {
        $base = 'mb-2 flex shrink-0 items-center justify-center [&_svg]:pointer-events-none [&_svg]:shrink-0';

        $variants = [
            'default' => 'bg-transparent',
            'icon' => 'bg-muted text-foreground flex size-10 shrink-0 items-center justify-center rounded-lg [&_svg:not([class*="size-"])]:size-6',
        ];

        $variantClass = $variants[$this->variant] ?? $variants['default'];

        return cn($base, $variantClass, $this->class);
    }
}
