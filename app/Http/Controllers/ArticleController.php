<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index() {
      $articles = Article::orderBy('updated_at', 'desc')->get();
      return view('articles.index', ['articles' => $articles]);
    }

    public function show($id) {
      $article = Article::find($id);  
      return view('articles.details',['article' => $article]);
    }

    public function update(ArticleStoreRequest $request, $id){
        $article = Article::find($id);
        $params = $request->validated();

        if ($request->hasFile('image')) {
          dump("here");
          $params['image'] = sprintf(
                  '/images/%s_%d.%s',
                  \pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME),
                  \time(),
                  $request->file('image')->getClientOriginalExtension()
              );

              if (Storage::exists('public'.$params['image'])) {
                  Storage::delete('public'.$params['image']);
              }

              $request->file('image')->storeAs('public', $params['image']);
              $request->image->move(public_path('images'), $params["image"]);
          }
        $article->update($params);

        return redirect()->route('details_article', $id);
    }
}
