<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableCell extends Component
{
    public ?string $class;

    public function __construct(?string $class = null)
    {
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.table-cell');
    }
}

