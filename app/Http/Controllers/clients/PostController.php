<?php

namespace App\Http\Controllers\clients;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = [
        //     'postNew' => Post::orderByDesc('id')->get(),
        //     'postTrend' => Post::get()->where('view_like', '>', 100),
        //     'postPopular' => Post::withCount('tags')->orderByDesc('tags_count')->get(),
        //     //đếm số lượng bài viết có nhiều tag nhất tương ứng với lệnh sql
        //     //select `posts`.*, (select count(*) from `tags` inner join `post_tags` on `tags`.`id` = `post_tags`.`tag_id` 
        //     //where `posts`.`id` = `post_tags`.`post_id`) as `tags
        // ];
        // // dd($data);
        $postNew =  Post::with(['tags', 'author'])
            ->orderByDesc('id')
            ->paginate(3);

        $postTrend =  Post::get()
            ->where('view_like', '>', 100);

        $postPopular =  Post::with('author', 'tags')
            ->withCount('tags')
            ->orderByDesc('tags_count')
            ->first();

        return view('clients.home.home', compact(
            'postNew',
            'postTrend',
            'postPopular'
        ));
    }

    public function postDetail($id)
    {
        $dataPost = Post::with('author', 'comments', 'tags')->find($id);
        // dd($dataPost);
        return view('clients.post-detail.index', compact(
            'dataPost',
        ));
    }

    public function search(Request $request)
    {
        // dd($request->navKeySearch);
        $listSearch = Post::with('author', 'tags')
            ->where('posts.content', 'like', "%$request->navKeySearch%")
            ->orWhere('posts.title', 'like', "%$request->navKeySearch%")
            ->get();
        return view('clients.home-search.index', compact('listSearch'));
    }
}
