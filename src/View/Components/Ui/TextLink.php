<?php

namespace EvolveUI\EvolveUI\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextLink extends Component
{
    public ?string $href;
    public ?string $method;
    public ?array $params;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $href = null,
        ?string $method = 'get',
        ?array $params = null,
        ?string $class = null
    ) {
        $this->href = $href;
        $this->method = strtolower($method);
        $this->params = $params;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('evolveui::components.ui.text-link');
    }

    public function linkClasses(): string
    {
        return cn(
            'text-muted-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:text-foreground hover:decoration-current dark:decoration-neutral-500',
            $this->class
        );
    }
}
