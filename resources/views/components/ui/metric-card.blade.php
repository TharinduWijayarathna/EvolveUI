@props([
    'title' => '',
    'value' => '',
    'change' => '',
    'trend' => 'up', // 'up' or 'down'
    'iconBgColor' => 'bg-[#B2D9FF]',
    'iconColor' => 'text-[#004C99]',
    'changeBgColor' => null,
    'changeColor' => null,
])

@php
    $isPositive = $trend === 'up';
    $defaultChangeBg = $isPositive ? 'bg-[#dcfce7]' : 'bg-[#fef2f2]';
    $defaultChangeText = $isPositive ? 'text-[#147340]' : 'text-[#c10007]';

    $changeBgClass = $changeBgColor ?? $defaultChangeBg;
    $changeTextClass = $changeColor ?? $defaultChangeText;
@endphp

<x-ui.card class="shadow-none">
    <x-ui.card-header>
        <x-ui.card-title class="text-sm font-medium text-muted-foreground">{{ $title }}</x-ui.card-title>
        <x-ui.card-action>
            <div class="ml-auto flex items-center justify-center rounded-md {{ $iconBgColor }} {{ $iconColor }} p-2">
                {{ $icon }}
            </div>
        </x-ui.card-action>
    </x-ui.card-header>
    <x-ui.card-content class="space-y-2.5">
        <div class="flex items-center gap-2.5">
            <span class="text-2xl font-medium tracking-tight text-foreground">{{ $value }}</span>
            <x-ui.badge class="{{ $changeBgClass }} {{ $changeTextClass }}">
                @if ($isPositive)
                    <x-icons.trending-up />
                @else
                    <x-icons.trending-down />
                @endif
                {{ $change }} %
            </x-ui.badge>
        </div>
    </x-ui.card-content>
</x-ui.card>
