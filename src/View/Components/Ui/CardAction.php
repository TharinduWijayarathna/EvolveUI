<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardAction extends Component
{
    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $class = '')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.card-action');
    }

    public function actionClasses(): string
    {
        return cn('col-start-2 row-span-2 row-start-1 self-start justify-self-end', $this->class);
    }
}
