<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index() {
      $articles = Article::All();
      return view('articles.index', ['articles' => $articles]);
    }

    public function show($id) {
      $article = Article::find($id);  
      return view('articles.details',['article' => $article]);
    }

    public function update(ArticleStoreRequest $request, $id){
        $article = Article::find($id);
        dd($article);
        $params = $request->validated();
        $file = Storage::put('public/images', $params['image']);
        $params['image'] = substr($file, 7);
        $article->update($params);
        return redirect()->route('details_article', $id);
    }
}
