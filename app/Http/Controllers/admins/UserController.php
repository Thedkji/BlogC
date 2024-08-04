<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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


    public function loginPost(Request $request)
    {
        $data = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $request->session()->regenerate();

        return redirect()->route('client.index')->with('message', 'Đăng nhập thành công');
    }
    public function register()
    {
        return view('admin.authen.register.register');
    }
    public function registerPost(AuthRequest $req)
    {
        $user = User::create(
            $req->all()
        );


        Auth::login($user);

        $req->session()->regenerate();   // Tạo lại session ID sau khi đăng nhập thành công
        // dd($req->all());

        return redirect()->route('client.index');
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
    }
}
