<!doctype html>
<html>
<head>
    @include('templating.header')
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        {{-- @include('templating.navbar') --}}
        @yield('content')
    <script src="{{ asset('./node_modules/flowbite/dist/flowbite.js')}}"></script>
    </div>

</body>
</html>