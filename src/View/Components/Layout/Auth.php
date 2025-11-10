<?php

namespace EvolveUI\EvolveUI\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    /**
     * The background image URL for the auth page.
     */
    public ?string $backgroundImage;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $backgroundImage = null)
    {
        $this->backgroundImage = $backgroundImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.layout.auth');
    }
}
