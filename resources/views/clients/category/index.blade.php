@extends('clients.layouts.master')

@section('title', 'Category')

@section('content')
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h1 class="h2 mb-4">{{ $cate->name }}</h1>


                    @foreach ($catePost as $data)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{ env('APP_STORAGE_IMG') }}/post/{{ $data->img }}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title"
                                        href="{{ route('client.postDetail', $data->id) }}">{{ $data->title }}</a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="images/john-doe.jpg">
                                            <span>{{ $data->author->name }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i
                                            class="ti-timer"></i>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i
                                            class="ti-calendar"></i>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            @foreach ($data->tags as $tag)
                                                <li class="list-inline-item"><a href="tags.html">{{ $tag->tag_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                @php
                                    $content = $data->content;
                                    $maxLength = 255;
                                    if (strlen($content) > $maxLength) {
                                        $content = substr($content, 0, $maxLength) . '...';
                                    }
                                @endphp
                                {!! $content !!}
                                <br>
                                <a href="post-details.html" class="btn btn-outline-primary">Đọc thêm</a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <aside class="col-lg-4 sidebar-inner">
                    @include('clients.home.aside')
                </aside>

            </div>
        </div>
    </section>

@endsection
