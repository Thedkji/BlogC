<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">
                <h2 class="h5 section-title">Bài viết gần đây</h2>
                @foreach ($postNew as $post)
                    <article class="card mb-4">
                        <div class="post-slider">
                            <a href="{{ route('client.postDetail',$post->id ) }}"><img src="{{ env('APP_STORAGE_IMG') }}/post/{{ $post->img }}" class="card-img-top" alt="post-thumb"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="###"></a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="images/john-doe.jpg" alt="John Doe">
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
                                $maxLength = 255;
                                if (strlen($content) > $maxLength) {
                                    $content = substr($content, 0, $maxLength) . '...';
                                }
                            @endphp
                            {!! $content !!}
                            </p>
                        </div>
                    </article>
                @endforeach


                <!-- Hiển thị phân trang -->
                <ul class="pagination justify-content-center">
                    <!-- Link tới trang đầu -->
                    @if ($postNew->currentPage() > 1)
                        <li class="page-item">
                            <a href="{{ $postNew->url(1) }}" class="page-link">««</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">««</span>
                        </li>
                    @endif

                    <!-- Link tới trang trước -->
                    @if ($postNew->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $postNew->previousPageUrl() }}" class="page-link">«</a>
                        </li>
                    @endif

                    <!-- Hiển thị các số trang -->
                    @php
                        $currentPage = $postNew->currentPage(); //Lấy ra số trang hiện tại
                        $lastPage = $postNew->lastPage(); //lấy ra số trang cuối cùng
                        $startPage = max(1, $currentPage - 1); //Tính toán bắt đầu trang hiển thị từ 1
                        $endPage = min($lastPage, $currentPage + 4); //Tính toán bắt đầu trang kết thúc max là tổng số trang = 7 qua 7 là dừng
                    @endphp

                    <!-- Hiển thị dấu ... nếu có các trang trước -->
                    @if ($startPage > 1)
                        {{-- Nếu trang hiện tại là 3 thì sẽ cho hiển thị ... lên đằng trc --}}
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

                    <!-- Hiển thị các số trang -->
                    @for ($i = $startPage; $i <= $endPage; $i++)
                        {{-- thay đổi phụ thuộc vào trang đang đứng --}}
                        <li class="page-item {{ $postNew->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $postNew->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Hiển thị dấu ... nếu có các trang sau -->
                    @if ($endPage < $lastPage)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

                    <!-- Link tới trang tiếp theo -->
                    {{-- kiểm tra xem còn trang tiếp theo ko nếu ko còn thì ko hiện next --}}
                    @if ($postNew->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $postNew->nextPageUrl() }}" class="page-link">»</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">»</span>
                        </li>
                    @endif

                    <!-- Link tới trang cuối cùng -->
                    @if ($postNew->currentPage() < $postNew->lastPage())
                        <li class="page-item">
                            <a href="{{ $postNew->url($postNew->lastPage()) }}" class="page-link">»»</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">»»</span>
                        </li>
                    @endif
                </ul>
            </div>
            <aside class="col-lg-4 @@sidebar">
                @include('clients.home.aside')
            </aside>
        </div>
    </div>
</section>
