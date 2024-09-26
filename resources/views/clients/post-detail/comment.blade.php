<div id="comment-script"></div>

<div class="mb-5 border-top mt-4 pt-5">
    <h3 class="mb-4">Bình luận</h3>

    @foreach ($dataPost->comments as $comment)
        <div class="media d-block d-sm-flex mb-4 pb-4">
            <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
            </a>
            <div class="media-body">
                <a href="#!" class="h4 d-inline-block mb-3">{{ $comment->name }}</a>

                <p>
                    {!! $comment->comment !!}
                </p>

                <span
                    class="text-black-800 mr-3 font-weight-600">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                <span class="text-black-800 mr-3 font-weight-600">
                    Chỉnh sửa lúc:
                    {{ \Carbon\Carbon::parse($comment->updated_at)->diffForHumans() }}
                </span>
                {{-- <a class="text-primary font-weight-600" href="#!">Reply</a> --}}
            </div>
        </div>
    @endforeach
</div>

<div>
    <h3 class="mb-4">Nhập bình luận</h3>
    <form action="{{ route('client.comment', $dataPost->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-12">
                <textarea class="form-control shadow-none" name="comment" rows="7"></textarea>
            </div>
        </div>

        <div>
            @if ($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <button class="btn btn-primary" type="submit">Gửi</button>
    </form>
</div>


<script>
    scrollTo('#comment-script')
</script>
