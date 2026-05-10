<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>@yield('title')</title>
    @include('layouts.partials.public.styles')
    @stack('style')
</head>

<body>
    <!-- navbar -->
    @include('layouts.partials.public.navbar')
    <!-- end navbar -->

    @yield('content')

    <!-- footer -->
    @include('layouts.partials.public.footer')
    <!-- end footer -->

    <!-- script -->
    @stack('modal')
    @include('layouts.partials.public.scripts')
    @stack('script')
</body>

</html>
