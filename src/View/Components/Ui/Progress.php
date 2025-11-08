<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Progress extends Component
{
    public int $value;
    public ?string $class;

    public function __construct(int $value = 0, ?string $class = null)
    {
        $this->value = $value;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.progress');
    }
}

