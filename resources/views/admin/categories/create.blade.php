@extends('admin.layouts.master')

@section('title', 'Thêm loại tin')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid bg-white p-3">
                <h2>Thêm mới loại tin</h2>
                <form action="{{ route('admin.category.store') }}" method="post" class="w-25 mt-4">
                    @csrf
                    <div>
                        <label for="" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <span>
                        @error('name')
                            <p class="alert alert-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </span>

                    <div>
                        <button type="submit" class="mt-3 text-white btn btn-success">Thêm</button>
                    </div>
                </form>

            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
