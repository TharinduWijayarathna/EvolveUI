@props([
    'title' => 'Wizard',
    'progress' => null, // Progress percentage (0-100), null to hide progress bar
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Soshable</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    @stack('styles')
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <main class="relative flex min-h-screen w-full flex-1 flex-col bg-background">
        {{-- Sticky Header --}}
        <header class="sticky top-0 z-20 flex h-16 shrink-0 items-center gap-2 border-b bg-background px-4">
            <div class="flex w-full items-center gap-1 lg:gap-2">
                {{-- Title with gradient --}}
                <h1 class="flex-1 bg-gradient-to-r from-[#69BFF9] via-[#B96AF3] to-[#F2AC3E] bg-clip-text text-sm font-medium leading-snug whitespace-normal break-words text-transparent sm:text-base">
                    {{ $header ?? '' }}
                </h1>
                {{-- Header Actions (buttons) --}}
                <div class="ml-auto flex items-center gap-2">
                    {{ $headerActions ?? '' }}
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <div class="flex flex-1 flex-col items-center justify-center gap-4 bg-muted/40">
            {{ $slot }}
        </div>

        {{-- Progress Bar Footer --}}
        @if(isset($footer))
            {{-- Custom footer slot --}}
            <div class="fixed bottom-0 left-0 z-20 w-full">
                {{ $footer }}
            </div>
        @elseif($progress !== null)
            {{-- Default progress bar --}}
            <div class="fixed bottom-0 left-0 z-20 w-full">
                <x-ui.progress
                    :value="$progress"
                    class="rounded-none [&>div]:bg-[linear-gradient(90deg,#69BFF9_0%,#B96AF3_29.94%,#E9685E_70.73%,#F2AC3E_100%)] h-3"
                />
            </div>
        @endif
    </main>
    
    @stack('scripts')
</body>
</html>

