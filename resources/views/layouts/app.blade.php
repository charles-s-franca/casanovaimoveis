<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('css')
            
        @show
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>

        <script src="{{ asset('/js/jquery-ui/jquery.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui/jquery-ui.min.js') }}"></script>

        @section('script')
            
        @show
    </body>
</html>