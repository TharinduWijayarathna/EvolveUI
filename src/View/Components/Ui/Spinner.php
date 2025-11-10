<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Spinner extends Component
{
    public $size;

    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $size = 'sm', ?string $class = null)
    {
        $this->size = $size;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.spinner');
    }

    public function spinnerClasses(): string
    {
        $sizes = [
            'default' => 'size-4',
            'xs' => 'size-3',
            'sm' => 'size-4',
            'md' => 'size-5',
            'lg' => 'size-6',
            'xl' => 'size-8',
        ];

        $sizeClass = $sizes[$this->size] ?? $sizes['default'];

        return cn('animate-spin text-current', $sizeClass, $this->class);
    }
}
