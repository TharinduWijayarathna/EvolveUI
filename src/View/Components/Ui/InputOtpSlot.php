<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputOtpSlot extends Component
{
    public int $index;

    /**
     * Create a new component instance.
     */
    public function __construct(int $index)
    {
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.input-otp-slot');
    }
}
