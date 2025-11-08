<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => $linkClasses(),
        'data-method' => $method,
        'data-params' => $params ? json_encode($params) : null,
    ]) }}>
    {{ $slot }}
</a>

@once
    <script>
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a[data-method]');
            if (!link) return;

            const href = link.getAttribute('href');
            const method = (link.getAttribute('data-method') || 'get').toLowerCase();
            const params = JSON.parse(link.getAttribute('data-params') || '{}');

            if (method === 'get') return; // normal GET link works

            e.preventDefault();
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = href;

            // Laravel method spoofing for PUT, PATCH, DELETE
            if (!['post'].includes(method)) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = method.toUpperCase();
                form.appendChild(methodInput);
            }

            // CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            if (csrfToken) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
            }

            // Add additional params
            for (const key in params) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = params[key];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        });
    </script>
@endonce
