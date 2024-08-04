<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class UserController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }
    public function login()
    {
        return view('admin.login.login');
    }



    public function post()
    {
    }
    public function postPost()
    {
    }
    public function editPost()
    {
    }
    public function updatePost()
    {
    }
    public function destroyPost()
    {
    }
}
