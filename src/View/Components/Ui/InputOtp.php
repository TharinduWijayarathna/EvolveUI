<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputOtp extends Component
{
    public string $name;

    public int $length;

    public ?string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, int $length = 6, ?string $value = null)
    {
        $this->name = $name;
        $this->length = $length;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.input-otp');
    }
}
