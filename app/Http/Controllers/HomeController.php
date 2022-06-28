<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Article;
use Illuminate\Http\Request;

>>>>>>> bd37664 (Page d'accueil)
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        return view('landing', compact('articles'));
    }
}
