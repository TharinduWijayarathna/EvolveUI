<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public bool $checked;

    public function __construct(bool $checked = false)
    {
        $this->checked = $checked;
    }

    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.checkbox');
    }
}

