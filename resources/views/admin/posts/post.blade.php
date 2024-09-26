@extends('admin.layouts.master')

@section('title', 'Danh sách tin')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Danh sách tin</h4>
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
                                                    <a href="{{ route('admin.post.create') }}" class="text-white">Thêm</a>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search"
                                                        placeholder="Tìm kiếm tin ...">
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
                                                    <th>ID</th>
                                                    <th>ID loại tin</th>
                                                    <th>ID tác giả</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Ảnh</th>
                                                    <th>Content</th>
                                                    <th>Lượt thích</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Ngày cập nhật</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($dataPost as $post)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $post->id }}</td>
                                                        <td>{{ $post->category_id }}</td>
                                                        <td>{{ $post->author_id }}</td>
                                                        <td>
                                                            <div style="width:200px;overflow: hidden;">
                                                                {{ $post->content }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $post->img }}</td>
                                                        <td>
                                                            <div style="width:300px;overflow: hidden;">
                                                                {{ $post->content }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $post->view_like }}</td>
                                                        <td>{{ $post->created_at }}</td>
                                                        <td>{{ $post->updated_at }}</td>

                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button class="btn btn-sm btn-success remove-item-btn">
                                                                        <a href="{{ route('admin.post.edit', $post->id) }}"
                                                                            class="text-white">Sửa</a>
                                                                    </button>
                                                                </div>
                                                                <div class="remove">
                                                                    <form
                                                                        action="{{ route('admin.post.destroy', $post->id) }}"
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
                                            {{ $dataPost->links() }}
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
