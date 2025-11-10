<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCalendar extends Component
{
    public $events;

    /**
     * Create a new component instance.
     */
    public function __construct($events = [])
    {
        $this->events = $events;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.event-calendar');
    }
}
