@extends('admin.layouts.master')

@section('title', 'Danh sách loại tin')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Danh sách loại tin</h4>
                            </div><!-- end card header -->
                            @session('message')
                                <p class="alert alert-success">{{ session('message') }}</p>
                            @endsession
                            <div class="card-body">
                                <div class="listjs-table" id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-success add-btn"><i
                                                        class="ri-add-line align-bottom me-1"></i>
                                                    <a href="{{ route('admin.category.create') }}"
                                                        class="text-white">Thêm</a>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                        placeholder="Tìm kiếm loại tin ...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="customer_name">ID</th>
                                                    <th class="sort" data-sort="email">Tên</th>
                                                    <th class="sort" data-sort="phone">Ngày tạo</th>
                                                    <th class="sort" data-sort="date">Ngày cập nhật</th>
                                                    <th class="sort" data-sort="action">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($dataCate as $cate)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $cate->id }}</td>
                                                        <td>{{ $cate->name }}</td>
                                                        <td>{{ $cate->created_at }}</td>
                                                        <td>{{ $cate->updated_at }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button class="btn btn-sm btn-success remove-item-btn">
                                                                        <a href="{{ route('admin.category.edit', $cate->id) }}"
                                                                            class="text-white">Sửa</a>
                                                                    </button>
                                                                </div>
                                                                <div class="remove">
                                                                    <form
                                                                        action="{{ route('admin.category.destroy', $cate->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button
                                                                            class="btn btn-sm btn-danger remove-item-btn"
                                                                            onclick="return confirm('Xóa loại tin này đồng nghĩa các bài viết có liên quan cũng sẽ bị xóa ?')">
                                                                            Xóa
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div>
                                            {{ $dataCate->links() }}
                                        </div>

                                    </div>

                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
@endsection
