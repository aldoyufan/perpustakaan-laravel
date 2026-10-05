<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PerpusKita') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="auth-page">
        <section class="auth-card">
            <a href="{{ url('/') }}" class="auth-brand"><span class="brand-mark">▥</span><span>Perpus<span class="brand-accent">Kita</span></span></a>
            {{ $slot }}
        </section>
    </main>
</body>
</html>
