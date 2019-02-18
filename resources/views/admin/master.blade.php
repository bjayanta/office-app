<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.layouts.head')
    </head>

    <body>
        <div id="app">
            @include('admin.layouts.header')

            <main class="py-4">
                <div class="container">
                    @include('layouts.partials.alert')
                </div>

                @section('main-content')
                @show
            </main>

            @include('admin.layouts.footer')
        </div>
    </body>
</html>

