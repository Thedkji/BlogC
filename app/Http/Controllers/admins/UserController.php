<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyAccount;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function dashboard()
    {

        return view('admin.dashboard.dashboard');
    }
    public function login()
    {
        return view('admin.authen.login.login');
    }


    public function loginPost(LoginRequest $request)
    {
        //Kiểm tra xem checkbox remember có tồn tại ko
        $remember = $request->has('remember');

        //đối số thứ 2 sẽ tự động thêm data vào trường remember_token trong db và khi session login hết hạn
        //thì trình duyệt sẽ dùng thằng remember để tự động login lại
        $data = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember);

        $user = Auth::user();

        $request->session()->regenerate();


        // Kiểm tra ng dùng đã đăng nhập nhưng chưa xác thực
        if ($data && is_null($user->email_verified_at)) {
            Auth::logout();
            return view('emails.email-verify-failed');
        }

        //Kiểm tra xem người dùng có đăng nhập và tích nhớ phiên ko , nếu ko xóa trường
        if ($data && !$remember) {
            User::query()->where('email', $user->email)
                ->update([
                    "remember_token" => null
                ]);
        }

        // Phân quyền người dùng
        if ($data && Auth::user()->role === "author") {
            return redirect()
                ->route('client.index')
                ->with('message', 'Đăng nhập thành công');
        } else if ($data && Auth::user()->role === "admin") {
            return redirect()
                ->route('admin.dashboard')
                ->with('message', 'Đăng nhập thành công admin');
        } else if (!$data) {
            return redirect()
                ->route('admin.login')
                ->with('message', 'Email hoặc mật khẩu sai')->withInput();
        }
    }
    public function register()
    {
        return view('admin.authen.register.register');
    }
    public function registerPost(RegisterRequest $req)
    {
        $user = User::create(
            [
                'email' => $req->email,
                'password' => bcrypt($req->password),  // Mã hóa mật khẩu bằng bcrypt
            ]
        );

        if ($user) {
            Mail::to($user->email)->send(new VerifyAccount($user));

            Auth::login($user);

            $req->session()->regenerate();   // Tạo lại session ID sau khi đăng nhập thành công
            // dd($req->all());
            return view('emails.email-verify-load', compact('user'));
        }
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate(); //Xóa hết session

        request()->session()->regenerate(); //Cập nhật lại phiên session id mới 

        return redirect()->route('client.index')->with('message', 'Đăng xuất thành công');
    }

    public function forgotPass()
    {
        return view('');
    }

    public function verifyEmail($email)  //Xác thực email ở mail gửi đi
    {
        $email = User::where('email', $email)
            ->whereNull('email_verified_at');

        $emailCheck = $email->firstOrFail();  //Kiểm tra xem người dùng đã verify chưa nếu có trả về data , chưa trả về 404

        $data = $email->update([
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);  //có data rồi thì thực hiện update trường email_verified_at

        return view('emails.email-verify-success');
    }
}
