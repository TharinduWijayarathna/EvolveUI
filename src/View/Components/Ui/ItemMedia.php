<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemMedia extends Component
{
    public string $variant;

    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = 'default', string $class = '')
    {
        $this->variant = $variant;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.item-media');
    }

    public function mediaClasses(): string
    {
        $variants = [
            'default' => 'flex shrink-0 items-center justify-center gap-2',
            'icon' => 'bg-muted size-8 rounded-sm border [&_svg:not([class*="size-"])]:size-4',
            'image' => 'size-10 overflow-hidden rounded-sm [&_img]:size-full [&_img]:object-cover',
        ];

        return cn($variants[$this->variant], $this->class);
    }
}
