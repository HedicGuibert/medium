<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\NewCommentNotification;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //Add a comment and send a notification to the author of the article
    public function create(CommentRequest $request, int $id): RedirectResponse
    {
        $params = $request->validated();
        $params['article_id'] = $id;
        $params['user_id'] = auth()->user()->id;
        $comment = new Comment($params);
        $comment->save();
        $article = Article::find($id);
        Mail::to($article->user->email)
            ->send(new NewCommentNotification([
                'user_name' => auth()->user()->name,
                'article_slug' => $article->slug,
                'article_name' => $article->title,
            ]));

        return back();
    }
}
