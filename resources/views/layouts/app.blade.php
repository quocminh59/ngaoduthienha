<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    {{--  header  --}}
    <div class="container-fluid wrap-header">
        <div class="row">
            @include('components.menu')
        </div>
        @yield('header-content')
    </div> {{-- end header  --}}  

    {{--  main-content  --}}
    @yield('content')

    {{--  footer  --}}
    @include('components.footer')
</body>
    @yield('script')
</html>