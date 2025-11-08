<?php

namespace EvolveUI\EvolveUI\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public $title;
    public $breadcrumbs;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null, ?array $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.layout.app');
    }
}
