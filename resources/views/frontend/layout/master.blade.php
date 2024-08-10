<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontend.layout.inc.style')
    <title>@yield('title')</title>
</head>

<body>
    @include('frontend.layout.inc.nav')


    @yield('content')


    @include('frontend.layout.inc.footer')
    @include('frontend.layout.inc.script')
    @include('frontend.layout.inc.showToast')
</body>

</html>
