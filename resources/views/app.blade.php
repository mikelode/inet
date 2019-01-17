<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    @include('partials.htmlheader')

<body>
    <div class="container-fluid">
        @include('partials.contentheader')
        <div id="main">
            @yield('main-content')
        </div>
        
    </div>
    @include('partials.footer')
        @include('partials.scripts') @yield('custom-scripts')
</body>

</html>