                <!-- Search -->
                {{-- <div class="widget">
                    <h4 class="widget-title"><span>Tìm kiếm</span></h4>
                    <form action="#!" class="widget-search">
                        <input class="mb-3" id="search-query" name="s" type="search"
                            placeholder="Tìm kiếm bài viết...">
                        <i class="ti-search"></i>
                        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                    </form>
                </div> --}}

                <!-- about me -->
                {{-- <div class="widget widget-about">
                    <h4 class="widget-title">Hi, I am Alex!</h4>
                    <img class="img-fluid" src="images/author.jpg" alt="Themefisher">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel in in donec iaculis tempus odio
                        nunc laoreet . Libero ullamcorper.</p>
                    <ul class="list-inline social-icons mb-3">

                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>

                    </ul>
                    <a href="about-me.html" class="btn btn-primary mb-2">About me</a>
                </div> --}}

                <!-- Promotion -->
                {{-- <div class="promotion">
                    <img src="images/promotion.jpg" class="img-fluid w-100">
                    <div class="promotion-content">
                        <h5 class="text-white mb-3">Create Stunning Website!!</h5>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur sociis. Etiam nunc amet
                            id dignissim. Feugiat id tempor vel sit ornare turpis posuere.</p>
                        <a href="https://themefisher.com/" class="btn btn-primary">Get Started</a>
                    </div>
                </div> --}}

                <!-- authors -->
                {{-- <div class="widget widget-author">
                    <h4 class="widget-title">Authors</h4>
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <img class="widget-author-image" src="images/john-doe.jpg">
                        </div>
                        <div class="media-body">
                            <h5 class="mb-1"><a class="post-title" href="author-single.html">Charls Xaviar</a>
                            </h5>
                            <span>Author &amp; developer of Bexer, Biztrox theme</span>
                        </div>
                    </div>
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <img class="widget-author-image" src="images/kate-stone.jpg">
                        </div>
                        <div class="media-body">
                            <h5 class="mb-1"><a class="post-title" href="author-single.html">Kate Stone</a>
                            </h5>
                            <span>Author &amp; developer of Bexer, Biztrox theme</span>
                        </div>
                    </div>
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <img class="widget-author-image" src="images/john-doe.jpg" alt="John Doe">
                        </div>
                        <div class="media-body">
                            <h5 class="mb-1"><a class="post-title" href="author-single.html">John Doe</a></h5>
                            <span>Author &amp; developer of Bexer, Biztrox theme</span>
                        </div>
                    </div>
                </div> --}}
                <!-- Search -->

                <div class="widget">
                    <h4 class="widget-title"><span>Bạn ko muốn bỏ lỡ tin tức mới nhất</span></h4>
                    <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank"
                        class="widget-search">
                        <input class="mb-3" id="search-query" name="s" type="search"
                            placeholder="Your Email Address">
                        <i class="ti-email"></i>
                        <button type="submit" class="btn btn-primary btn-block" name="subscribe">Gửi mail
                        </button>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                        </div>
                    </form>
                </div>

                <!-- categories -->
                <div class="widget widget-categories">
                    <h4 class="widget-title"><span>Danh mục bài viết</span></h4>
                    <ul class="list-unstyled widget-list">
                        @foreach ($dataCate->take(10) as $cate)
                            <li><a href="{{ route('client.category',$cate->id) }}" class="d-flex">{{ $cate->name }} <small
                                        class="ml-auto">(4)</small></a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- tags -->
                <div class="widget">
                    <h4 class="widget-title"><span>Thẻ bài viết mới nhất</span></h4>
                    <ul class="list-inline widget-list-inline widget-card">
                        @foreach ($dataTag->take(10) as $tag)
                            <li class="list-inline-item"><a href="{{ route('client.category',$tag->id) }}">{{ $tag->tag_name }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- recent post -->
                {{-- <div class="widget">
                    <h4 class="widget-title">Recent Post</h4>

                    <!-- post-item -->
                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="images/post/post-10.jpg">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                                        Template.</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>15 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="images/post/post-3.jpg">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                        Something</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="images/post/post-7.jpg">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                        Something</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div> --}}

                <!-- Social -->
                {{-- <div class="widget">
                    <h4 class="widget-title"><span>Social Links</span></h4>
                    <ul class="list-inline widget-social">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div> --}}
