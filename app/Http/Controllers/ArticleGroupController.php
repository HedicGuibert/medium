<?php

namespace App\Http\Controllers;

use App\Models\ArticleGroup;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleGroupController extends Controller
{
    public function index(Request $request, $userId = null)
    {
        $articleGroups = (User::find($userId))
            ? ArticleGroup::where('user_id', $userId)->paginate(5)
            : ArticleGroup::paginate(5);


        return view('article-group.list', compact('articleGroups'));
    }
}
