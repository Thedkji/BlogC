@extends('admin.authen.layouts.master')

@section('title', 'Chờ xác thực email người dùng')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-body p-4 text-center">
                    <div class="avatar-lg mx-auto mt-2">
                        <div class="avatar-title bg-light text-success display-3 rounded-circle">
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-2">
                        <h4> Xác thực thành công !</h4>
                        <p class="text-muted mx-4">
                            Chào mừng bạn đến với BlogC nơi cập nhật những tin tức mới nhất về công nghệ 
                            cũng như là nơi bạn có thể thỏa sức đăng bài và giao lưu với những tác giả của 
                            các bài viết khác !
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('admin.login') }}" class="btn btn-success w-100">Đăng nhập ngay</a>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>

@endsection
