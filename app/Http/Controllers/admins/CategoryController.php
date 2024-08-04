<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCate = Category::query()->latest('id')->paginate(5);
        // dd($dataCate);
        return view('admin.categories.category', compact('dataCate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::query()->create($request->all());

        return Redirect()->route('admin.category.index')->with('message', "Thêm thành công");
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
        $data = Category::query()->find($id);
        return view('admin.categories.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = Category::query()->find($id);
        $data->update($request->all());

        return redirect()->route('admin.category.edit', $data->id)->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cate = Category::query()->find($id);

        $cate->delete();

        return redirect()->route('admin.category.index')->with('message', 'Xóa loại tin thành công');
    }
}
