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
                        <h4>Gửi email xác thực thành công !</h4>
                        <p class="text-muted mx-4">
                            Chúng tôi đã gửi 1 email xác thực đến hộp thư của bạn , vui lòng kiểm tra hộp thư
                            có địa chỉ email là : {{ $user->email }}
                        </p>
                        <div class="mt-4">
                            <a href="https://mail.google.com/mail" class="btn btn-success w-100">Kiểm tra hộp thư</a>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>

@endsection
