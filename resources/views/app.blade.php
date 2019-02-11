<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    @include('partials.htmlheader')

<body>
    <div class="container-fluid" style="min-height: calc(100vh - 35px);">
        @include('partials.contentheader')
        @yield('main-banner')
        <div id="main">
            @yield('main-content')
        </div>
        
    </div>
    @include('partials.footer')
        @include('partials.scripts') @yield('custom-scripts')
</body>

</html>