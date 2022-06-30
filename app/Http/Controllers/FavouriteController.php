<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FavouriteArticles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index()
    {
        $articles = User::find(Auth::id())->favourites()->paginate(6);
        return view('favourite', compact('articles'));
    }

    public function add($id)
    {

        $favourite = new FavouriteArticles(['article_id' => $id, 'user_id' => Auth::id()]);

        if ($favourite == null) {
            return response()->json(
                [
                    'error' => true,
                    'message' => "L'article est déjà dans vos favoris"
                ]
            );
        }

        $favourite->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Article ajouté à vos favoris'
            ]
        );
    }
    public function remove($id)
    {
        $favourite = FavouriteArticles::where(['article_id' => $id, 'user_id' => Auth::id()])->first();

        if ($favourite == null) {
            return response()->json(
                [
                    'error' => true,
                    'message' => "L'article n'est pas dans vos favoris"
                ]
            );
        }

        $favourite->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "L'article à été supprimé de vos favoris"
            ]
        );
    }
}
