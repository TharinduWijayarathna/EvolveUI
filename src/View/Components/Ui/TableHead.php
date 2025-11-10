<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHead extends Component
{
    public ?string $class;

    public function __construct(?string $class = null)
    {
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.table-head');
    }
}
