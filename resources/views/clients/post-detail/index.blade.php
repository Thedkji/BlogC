@extends('clients.layouts.master')

@section('title', 'PostDetail')
@section('content')
    {{-- component điều chỉnh scroll --}}
    @include('clients.components.scrollTo')

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ env('APP_STORAGE_IMG') }}/post/{{ $dataPost->img }}" class="card-img"
                                alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $dataPost->title }}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="images/john-doe.jpg">
                                    <span>{{ $dataPost->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>{{ \Carbon\Carbon::parse($dataPost->created_at)->diffForHumans() }}
                            </li>
                            <li class="list-inline-item">
                                <i
                                    class="ti-calendar"></i>{{ \Carbon\Carbon::parse($dataPost->created_at)->format('d-m-Y') }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($dataPost->tags as $tag)
                                        <li class="list-inline-item"><a href="tags.html">{{ $tag->tag_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="content">
                            {!! $dataPost->content !!}
                        </div>

                    </article>

                </div>

                <div class="col-lg-9 col-md-12">
                    @include('clients.post-detail.comment')
                </div>

            </div>
        </div>

        @session('error')
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endsession

        @session('message')
            <p class="alert alert-success">{{ session('message') }}</p>
        @endsession
    </section>

@endsection
