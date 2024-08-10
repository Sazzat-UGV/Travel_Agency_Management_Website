<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('user.layout.inc.style')
    <title>@yield('title')</title>
</head>

<body class="tt-magic-cursor style-2">
    @include('user.layout.inc.nav')

    <div class="dashboard-wrapper">
        @include('user.layout.inc.sidebar')
        <div class="main-content">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @include('user.layout.inc.script')
    @include('user.layout.inc.showToast')
</body>

</html>
