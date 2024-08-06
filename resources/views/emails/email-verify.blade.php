<h3>Xin chào : {{ $account->email }}</h3>

<p>Để xác thực đăng ký tài khoản bạn vui lòng click vào nút xác nhận bên dưới đây</p>

<p>
    <button class="btn btn-primary">
        <a href="{{ route('admin.verify-email', $account->email) }}" class="text-decoration-none text-white">
            Xác Minh Tài Khoản
        </a>
    </button>
</p>
