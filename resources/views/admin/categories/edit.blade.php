@extends('admin.layouts.master')

@section('title', 'Sửa loại tin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div>
                <button class="btn btn-primary mb-2">
                    <a href="{{ route('admin.category.index') }}" class="text-white">Quay lại</a>
                </button>
            </div>
            <div>
                @session('message')
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endsession
            </div>
            <div class="container-fluid bg-white p-3">
                <h2>Sửa mới loại tin</h2>
                <form action="{{ route('admin.category.update', $data->id) }}" method="post" class="w-25 mt-4">
                    @csrf
                    @method('put')
                    <div>
                        <label for="" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                    </div>
                    <span>
                        @error('name')
                            <p class="alert alert-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </span>

                    <div>
                        <button type="submit" class="mt-3 text-white btn btn-success">Sửa</button>
                    </div>
                </form>

            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
