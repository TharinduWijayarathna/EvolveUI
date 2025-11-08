<?php

namespace EvolveUI\EvolveUI\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Head extends Component
{
    public ?string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.layout.head');
    }

    /**
     * Returns the full page title including app name
     */
    public function fullTitle(): string
    {
        $appName = config('app.name', 'MyApp');

        return $this->title ? "{$this->title} – {$appName}" : $appName;
    }
}
