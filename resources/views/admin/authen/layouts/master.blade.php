<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    @include('admin.authen.layouts.partials.head')
</head>

<body>

    @include('admin.authen.layouts.partials.background-auth')

    @yield('content')


    @include('admin.authen.layouts.partials.js')
</body>

</html>
