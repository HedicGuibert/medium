<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function create(CommentRequest $request, int $id): RedirectResponse
    {
        $params = $request->validated();
        $params['article_id'] = $id;
        $params['user_id'] = auth()->user()->id;
        $comment = new Comment($params);
        $comment->save();
        return back();
    }
}
