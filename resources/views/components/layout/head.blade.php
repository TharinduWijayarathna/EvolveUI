@props(['title' => null])

<title>{{ $fullTitle() }}</title>

{{-- Any additional meta, links, or custom content --}}
{{ $slot }}
