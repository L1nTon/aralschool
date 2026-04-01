<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>

    @yield('meta')

</head>


<body>
    <div class="lines">
        <span class="vertical-line line-1"></span>
        <span class="vertical-line line-2"></span>
        <span class="vertical-line line-3"></span>
    </div>

    <x-header :menus="$menus" :site_translations="$site_translations"></x-header>


    <x-mobile-nav :menus="$menus"></x-mobile-nav>

    <main class="container">
        @yield('content')
    </main>

    <x-footer></x-footer>

    <script src="./js/scripts.js"></script>
</body>

</html>
