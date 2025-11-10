<?php

namespace BladeCN\BladeCN\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AvatarFallback extends Component
{
    public $name;

    public $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name = '', string $class = '')
    {
        $this->name = $name;
        $this->class = trim($class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('bladecn::components.ui.avatar-fallback');
    }

    public function fallbackClasses(): string
    {
        return cn(
            'flex h-full w-full items-center justify-center rounded-full bg-muted',
            $this->class
        );
    }

    public function initials(): string
    {
        if (empty(trim($this->name))) {
            return '';
        }

        $words = preg_split('/\s+/', trim($this->name));

        if (count($words) === 0) {
            return '';
        }

        // Get first letter of first word
        $first = mb_substr($words[0], 0, 1, 'UTF-8');

        // Get first letter of second word if it exists, otherwise use first word's second letter
        if (count($words) >= 2) {
            $second = mb_substr($words[1], 0, 1, 'UTF-8');
        } else {
            // If only one word, use first two letters
            $second = mb_strlen($words[0]) > 1 ? mb_substr($words[0], 1, 1, 'UTF-8') : '';
        }

        return strtoupper($first.$second);
    }
}
