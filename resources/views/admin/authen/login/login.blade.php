@extends('admin.authen.layouts.master')

@section('title', 'Đăng nhập')

@section('content')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Chào mừng bạn !</h5>
                                    <p class="text-muted">Đăng nhập ngay để đến với chúng tôi</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('admin.login-post') }}" method='post'>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email"
                                                placeholder="Nhập email đã đăng ký" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="{{ route('admin.forgot-pass') }}" class="text-muted">
                                                    Quên mật khẩu</a>
                                            </div>

                                            <label class="form-label" for="password-input">Mật khẩu</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input"
                                                    placeholder="Nhập mật khẩu của bạn" id="password-input" name="password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <p class="alert alert-danger mt-2">{{ $message }}</p>
                                            @enderror

                                            @session('message')
                                                <p class="alert alert-danger mt-2">{{ session('message') }}</p>
                                            @endsession

                                            @session('message2')
                                                <p class="alert alert-success mt-2">{{ session('message2') }}</p>
                                            @endsession

                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check" name="remember">
                                            <label class="form-check-label" for="auth-remember-check">
                                                Nhớ mật khẩu
                                            </label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Đăng Nhập</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Đăng nhập với</h5>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                        class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                        class="ri-google-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                        class="ri-github-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-info btn-icon waves-effect waves-light"><i
                                                        class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Bạn chưa có tài khoản ? <a href="{{ route('admin.register') }}"
                                    class="fw-semibold text-primary text-decoration-underline"> Đăng ký ngay </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
@endsection
