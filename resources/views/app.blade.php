<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    @include('partials.htmlheader')

<body>
    @include('partials.contentheader')
    <div id="main">
        @yield('main-content')
    </div>
    @include('partials.footer')
    @include('partials.scripts') @yield('custom-scripts')
</body>

</html>