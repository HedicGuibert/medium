<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\NewCommentNotification;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //Add a comment and send a notification to the author of the article
    public function create(CommentRequest $request, string $id): RedirectResponse
    {
        $params = $request->validated();

        $article = Article::where('slug', $id)->first();
        $params['article_id'] = $article->id;
        $params['user_id'] = auth()->user()->id;
        $comment = new Comment($params);
        $comment->save();
        Mail::to($article->user->email)
            ->send(new NewCommentNotification([
                'user_name' => auth()->user()->name,
                'article_slug' => $article->slug,
                'article_name' => $article->title,
            ]));

        return back()->with('success','Commentaire ajouté !');
    }

    public function modify(CommentRequest $request, $id, $comment_id):RedirectResponse {
        $params = $request->validated();

        $comment = Comment::find($comment_id);

        if($comment->user_id !== auth()->user()->id) {
            return back()->with('error','Vous n\'avez pas le droit de modifier ce commentaire');
        }
        $comment->update(['content' => $params['content']]);
        return back()->with('success','Commentaire modifié !');
    }
}
