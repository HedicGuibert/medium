<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
      $articles = Article::All();
      return view('articles.index', ['articles' => $articles]);
    }
}
