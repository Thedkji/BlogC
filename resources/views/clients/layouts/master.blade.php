<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    @include('clients.layouts.partials.head')
</head>

<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            @include('clients.layouts.partials.header-nav')
        </div>
    </header>
    <!-- /navigation -->


    @yield('content')

    <footer class="footer">
        @include('clients.layouts.partials.footer')
    </footer>


    {{-- JS --}}
    @include('clients.layouts.partials.js')
</body>

</html>
