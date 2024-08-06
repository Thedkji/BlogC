@extends('admin.authen.layouts.master')

@section('title', 'Đăng ký')

@section('content')
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
                                <h5 class="text-primary">Đăng ký tài khoản mới</h5>
                                <p class="text-muted">Tạo tài khoản và đến với chúng tôi ngay thôi nào !</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form class="needs-validation" action="{{ route('admin.register-post') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Nhập địa chỉ email của bạn" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Nhập mật khẩu của bạn">
                                        @error('password')
                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                        @error('password_confirmation')
                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="username" class="form-label">Chọn quyền<span
                                                class="text-danger">*</span></label>
                                        <select name="type" id="" class="form-select">
                                            <option value="">Chọn lựa quyền (Bạn có thể đổi lại trong trang thông tin)
                                            </option>
                                            <option value="0">Người dùng thường(chỉ xem nội dung không có chức năng
                                                đăng bài)</option>
                                            <option value="1">Người dùng là tác giả(xem nội dung và có chức năng đăng
                                                bài)</option>
                                        </select>

                                        @error('type')
                                            <p class="alert alert-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div> --}}

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Đăng ký</button>
                                    </div>

                                    <!-- Các nút đăng nhập mạng xã hội khác -->
                                </form>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Bạn đã có tài khoản ?<a href="{{ route('admin.login') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Đăng nhập </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
