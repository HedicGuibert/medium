<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->get('input');
        $articles = Article::where('title', 'like', "%$input%")->paginate(6);
        return view('landing', compact('articles'));
    }
}
