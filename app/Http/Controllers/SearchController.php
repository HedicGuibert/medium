<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->get('input');
        $articles = Article::where('title', 'like', "%$input%")->paginate(6);

        return view('landing', compact('articles'));
    }
}
