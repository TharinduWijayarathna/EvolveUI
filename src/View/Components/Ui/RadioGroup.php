<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    public string $name;

    public array $options;

    public string $value;

    public ?string $class;

    public function __construct(
        string $name = 'radio-group',
        array $options = [],
        string $value = '',
        ?string $class = null
    ) {
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.radio-group');
    }
}
