<?php

namespace EvolveUI\EvolveUI\Tests;

use EvolveUI\EvolveUI\View\Components\Ui\Button;
use EvolveUI\EvolveUI\View\Components\Layout\Auth;
use EvolveUI\EvolveUI\View\Components\Layout\App;

it('can render button component', function () {
    $component = new Button();
    $view = $component->render();

    expect($view)->toBeInstanceOf(\Illuminate\Contracts\View\View::class);
});

it('can render auth layout component', function () {
    $component = new Auth();
    $view = $component->render();

    expect($view)->toBeInstanceOf(\Illuminate\Contracts\View\View::class);
});

it('can render app layout component', function () {
    $component = new App();
    $view = $component->render();

    expect($view)->toBeInstanceOf(\Illuminate\Contracts\View\View::class);
});

it('button component has correct default classes', function () {
    $component = new Button();
    $classes = $component->buttonClasses();

    expect($classes)->toContain('inline-flex');
    expect($classes)->toContain('items-center');
    expect($classes)->toContain('justify-center');
});

