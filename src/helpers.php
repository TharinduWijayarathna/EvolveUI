<?php

if (!function_exists('cn')) {
    /**
     * Merge class names together, filtering out empty values.
     * Similar to clsx utility in JavaScript.
     *
     * @param  string|array  ...$classes
     * @return string
     */
    function cn(...$classes): string
    {
        $classes = array_filter(
            array_map(function ($class) {
                if (is_array($class)) {
                    return cn(...$class);
                }
                return is_string($class) ? trim($class) : '';
            }, $classes),
            fn($class) => !empty($class)
        );

        return implode(' ', $classes);
    }
}

