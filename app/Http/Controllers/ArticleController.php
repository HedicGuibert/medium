<?php

namespace App\Http\Controllers;

use App\Models\Article;

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
}
