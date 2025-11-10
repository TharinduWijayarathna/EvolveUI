<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $breadcrumbs;

    public function __construct(array $breadcrumbs = [])
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.breadcrumb');
    }
}
