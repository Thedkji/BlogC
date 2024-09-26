<?php

namespace App\Http\Controllers\clients;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Http\Requests\CommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function storeComment($id, CommentRequest $request)
    {
        try {
            $post = Post::findOrFail($id);
            $comment = Comment::create([
                "author_id" => $post->author->id,
                "post_id" => $post->id,
                "user_id" => $post->author->user_id,
                "comment" => $request->comment,
                "name" => $post->author->name
            ]);

            return back();
        } catch (\Throwable $th) {
            return HelperController::handleException($th);
        }
    }
}
