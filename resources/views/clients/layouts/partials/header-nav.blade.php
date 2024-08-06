<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="index.html">
        <img class="img-fluid" width="100px" src="{{ env('APP_URL') }}/reader/images/logo.png"
            alt="Reader | Hugo Personal Blog Template">
    </a>

    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('client.index') }}">
                    Trang chủ
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="###">
                    Loại tin <i class="ti-angle-down ml-1"></i>
                </a>
                <div class="dropdown-menu">

                    @foreach ($dataCate as $cate)
                        <a class="dropdown-item"
                            href="{{ route('client.category', $cate->id) }}">{{ $cate->name }}</a>
                    @endforeach

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.html">Tin tức</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Liên hệ
                </a>

            </li>

            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login') }}">Đăng Nhập</a>
                </li>
            @elseif (Auth::check() && Auth::user()->role === 'author')
                <li class="nav-item dropdown">
                    <a class="nav-link" href="###">
                        Chức năng <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="###">Thông tin cá nhân</a>
                        <a class="dropdown-item" href="###">Đăng Bài</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Đăng Xuất</a>
                    </div>
                </li>
            @elseif (Auth::check() && Auth::user()->role === 'admin')
                <li class="nav-item dropdown">
                    <a class="nav-link" href="###">
                        Chức năng <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Trang quản trị</a>
                        <a class="dropdown-item" href="###">Thông tin</a>
                        <a class="dropdown-item" href="###">Đăng Bài</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Đăng Xuất</a>
                    </div>
                </li>
            @endif

            @session('message')
                <p class="alert alert-success">{{ session('message') }}</p>
            @endsession
        </ul>
    </div>

    <div class="order-2 order-lg-3 d-flex align-items-center">
        {{-- <select class="m-2 border-0 bg-transparent" id="select-language">
            <option id="en" value="" selected>En</option>
            <option id="fr" value="">Fr</option>
        </select> --}}

        <!-- search -->
        <form class="search-bar" action="{{ route('client.search') }}">
            <input id="search-query" name="navKeySearch" type="search" placeholder="Tìm kiếm bài viết ...">
            <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                data-target="#navigation">
                <i class="ti-menu"></i>
            </button>
        </form>

    </div>

</nav>
