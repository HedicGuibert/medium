<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $id){
        $params = $request->validated();
        $params['article_id'] = $id;
        $params['user_id'] = auth()->user()->id;
        $comment = new Comment($params);
        $comment->save();
        return back();
    }
}
