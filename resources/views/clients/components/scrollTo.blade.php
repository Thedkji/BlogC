<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function scrollTo(id, time = 0) {
        $(document).ready(function() {
            @if ($errors->any())
                console.log('Có lỗi, thực hiện cuộn trang bằng jQuery');
                $('html, body').animate({
                    scrollTop: $(id).offset().top
                }, time);
            @else
                console.log('Không có lỗi');
            @endif
        });
    }
</script>
