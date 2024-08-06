<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $dataPost = Post::query()->latest('id')->paginate(5);

        return view('admin.posts.post', compact('dataPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // upload ảnh 
        // Sửa trong env sửa FILESYSTEM_DISK=local thành public
        //Chạy lệnh php artisan storage:link 
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('imgs/post', $fileName);

            $data = $request->except(['img', '_method', '_token']); //loại bỏ trường img ra khỏi request debug ra sẽ thấy data là 1 mảng
            // dd($data);
            if ($fileName) {
                $data['img'] = $fileName; //thêm dữ liệu mới vào mảng
            }
            Post::query()->create($data);  //dữ liệu mới sau khi đã sử lý ảnh
        } else {
            Post::query()->create($request->all());
        };


        return Redirect()->route('admin.post.index')->with('message', "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::query()->find($id);


        return view('admin.posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::query()->find($id); //tìm kiếm sản phẩm với id định sửa

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('imgs/post', $fileName);

            //Kiểm tra nếu có file thì loại bỏ trường img cũ trong model và tiến hành create
            $data = $request->except(['img', '_method', '_token']); //loại bỏ trường img ra khỏi request debug ra sẽ thấy data là 1 mảng
            // dd($data);
            if ($fileName) {
                $data['img'] = $fileName; //thêm dữ liệu img mới vào mảng
            }
        } else {
            $data = $request->except(['img', '_method', '_token']); //loại bỏ trường img ra khỏi request debug ra sẽ thấy data là 1 mảng
            $data['img'] = $post->img; //giữ nguyên hình ảnh nếu ko thay đổi
        };

        $post->update($data);  //dữ liệu mới sau khi đã sử lý ảnh
        return redirect()->route('admin.post.edit', $id)->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::query()->find($id);

        $post->delete();
        return redirect()->route('admin.post.index')->with('message', 'Xóa loại tin thành công');
    }
}
