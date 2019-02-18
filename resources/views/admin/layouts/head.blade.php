<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('public/admin/js/app-admin.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

<!-- ionicons -->
<link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('public/admin/css/app-admin.css') }}" rel="stylesheet">

{{-- add stylesheet --}}
@stack('style')
