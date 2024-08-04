<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    @include('admin.layouts.partials.head')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            @include('admin.layouts.partials.header')
        </header>

        <!-- removeNotificationModal -->
        @include('admin.layouts.partials.remove-notification-modal')
        <!-- /.modal -->

        <!-- ========== App Menu ========== -->
        @include('admin.layouts.partials.side-bar')
        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- end main content-->

        @include('admin.layouts.partials.footer')
    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    @include('admin.layouts.partials.start-back-to-top')
    <!--end back-to-top-->

    <!--preloader-->
    @include('admin.layouts.partials.preloader')

    <!-- Theme Settings -->

    @include('admin.layouts.partials.theme-setting')

    @include('admin.layouts.partials.script')
</body>

</html>
