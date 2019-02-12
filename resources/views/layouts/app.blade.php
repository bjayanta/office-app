<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <main class="py-4">
            <div class="container">
                @include('layouts.partials.alert')
            </div>

            @yield('content')

        </main>
    </div>
</body>
</html>
