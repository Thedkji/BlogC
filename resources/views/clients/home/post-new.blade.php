<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Bài viết mới nhất</h2>
                @foreach ($postNew->take(1) as $post)
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.postDetail',$post->id ) }}">{{ $post->title }}</a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ env('APP_URL') }}/reader/images/john-doe.jpg">
                                        <span>{{ $post->author->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i
                                        class="ti-timer"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </li>
                                <li class="list-inline-item">
                                    <i
                                        class="ti-calendar"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($post->tags as $tag)
                                            <li class="list-inline-item"><a href="tags.html">{{ $tag->tag_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            @php
                                $content = $post->content;
                                $maxLeng = 200;
                                if (strlen($content) > $maxLeng) {
                                    $content = substr($content, 0, $maxLeng) . '...';
                                }
                                echo "<p>$content</p>";
                            @endphp
                            <a href="post-details.html" class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Bài viết xu hướng</h2>

                @foreach ($postTrend->take(3) as $post)
                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="images/post/post-3.jpg">
                            <div class="ml-3">
                                <h4><a href="{{ route('client.postDetail',$post->id ) }}" class="post-title">{{ $post->title }}</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i
                                            class="ti-calendar"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i
                                            class="ti-timer"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach
                {{-- <a href="post-details.html" class="btn btn-outline-primary">Đọc thêm</a> --}}

            </div>

            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">bài viết phổ biến</h2>

                <article class="card">
                    <div class="post-slider slider-sm">
                        <img src="images/post/post-5.jpg" class="card-img-top" alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.postDetail',$postPopular->id ) }}">{{ $postPopular->title }}</a>
                        </h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="images/kate-stone.jpg" alt="Kate Stone">
                                    <span>{{ $postPopular->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            </li>
                            <li class="list-inline-item">
                                <i
                                    class="ti-calendar"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($postPopular->tags as $tag)
                                        <li class="list-inline-item"><a href="tags.html">{{ $tag->tag_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        @php
                            $content = $post->content;
                            $maxLeng = 200;
                            if (strlen($content) > $maxLeng) {
                                $content = substr($content, 0, $maxLeng) . '...';
                            }
                            echo "<p>$content</p>";
                        @endphp
                        <a href="post-details.html" class="btn btn-outline-primary">Đọc thêm</a>
                    </div>
                </article>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</section>
