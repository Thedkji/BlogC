@extends('admin.authen.layouts.master')

@section('title', 'Chờ xác thực email người dùng')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-body p-4 text-center">
                    <div class="avatar-lg mx-auto mt-2">
                        <div class="avatar-title bg-light text-danger display-3 rounded-circle">
                            <i class="ri-close-circle-fill"></i>
                        </div>
                        
                    </div>

                    <div class="mt-4 pt-2">
                        <h4>Tài khoản chưa được xác thực !</h4>
                        @session('error')
                            <p class="alert alert-danger">{{ session('error') }}</p>
                        @endsession
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
