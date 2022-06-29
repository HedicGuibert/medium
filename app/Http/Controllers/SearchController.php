<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Article;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $params = $request->validated();
        $input = $params['input'];
        $articles = Article::where('title', 'like', "%$input%")->get();

        return view('landing', compact('articles'));
    }
}
