@extends('admin.layouts.master')

@section('title', 'Thêm bài viết')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid bg-white p-3">
                <h2>Thêm bài viết</h2>
                <form action="{{ route('admin.post.store') }}" method="post" class="w-100 mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div>
                                @error('title')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">ID Danh mục</label>
                                <select name="category_id" id="" class="form-select">
                                    @foreach ($dataCate as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">Tác giả</label>
                                <select name="author_id" id="" class="form-select">
                                    @foreach ($dataAuthor as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="" class="form-label">Ảnh</label>
                                <input type="file" name="img" class="form-control">
                            </div>

                            <div class="mb-2 w-25">
                                <label for="" class="form-label">Lượt thích</label>
                                <input type="number" name="view_like" class="form-control" value="{{ old('view_like') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="" class="form-label">Nội dung</label>
                                <textarea name="content" id="content" cols="30" rows="10" style="height: 400px;">{{ old('content') }}</textarea>
                            </div>
                        </div>

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


    {{-- CKeditor5 not html --}}
    <script type="importmap">
        {
            "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
            }
        }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            Heading, // Add Heading plugin
            List, // Add List plugin
            BlockQuote, // Add BlockQuote plugin
            Link,
            Image,
            ImageToolbar,
            ImageUpload,
            Table,
            MediaEmbed
        } from 'ckeditor5';

        ClassicEditor.create(document.querySelector('#content'), {
                plugins: [
                    Essentials,
                    Paragraph,
                    Bold,
                    Italic,
                    Font,
                    Heading,
                    List,
                    BlockQuote,
                    Link,
                    Image,
                    ImageToolbar,
                    ImageUpload,
                    Table,
                    MediaEmbed
                ],
                toolbar: {
                    items: [
                        'heading',
                        '|', 'bold', 'italic', '|',
                        'numberedList', 'bulletedList', '|',
                        'link', 'blockquote', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
                        'undo', 'redo'
                    ]
                },
                image: {
                    toolbar: [
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side',
                        '|',
                        'toggleImageCaption',
                        'imageTextAlternative'
                    ]
                },
                simpleUpload: {
                    uploadUrl: '/your-upload-endpoint'
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
    </script>


@endsection
