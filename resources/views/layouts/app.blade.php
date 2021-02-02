<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @include('inc/links')

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="app">
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            @guest
              @include('inc/entry-nav')
            @else
              @include('inc/navbar')
            @endguest
            <main class="py-4">
                @yield('content')
            </main>
            @include('inc/footer')
            <!-- Scripts -->
            @include('inc/scripts')
        </div>
    </div>
</body></html>
